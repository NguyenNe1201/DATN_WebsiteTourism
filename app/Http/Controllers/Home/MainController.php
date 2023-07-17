<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\AddBlog;
use App\Models\Admin\AddCategoryBlog;
use App\Models\Admin\AddGalleryTour;
use App\Models\Admin\AddTour;
use App\Models\Admin\TourGuider;
use App\Models\BookGuider;
use App\Models\BookTour;
use App\Models\CommentBlog;
use App\Models\ReviewGuider;
use App\Models\ReviewTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FavoriteTour;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRatedTour;
use App\Models\Admin\Profile;
use Phpml\Math\Similarity\Cosine;
use Phpml\Math\Statistic\Mean;
use Phpml\Math\Matrix;
use Ramsey\Uuid\Guid\GuidBuilder;

class MainController extends Controller
{
    // view home page
    public function index()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        // xuất blog có nhiều bình luận
        $blogtopbinhluan = AddBlog::with('user')->withCount('comments')->orderByDesc('comments_count')->take(5)->get();
        // Đếm số lượng comment của từng blog
        $commentCounts = CommentBlog::select('blog_single_id', DB::raw('count(*) as total'))
            ->groupBy('blog_single_id')
            ->pluck('total', 'blog_single_id');
        // đêm số review của từng tour
        $reviewCounts = ReviewTour::select('tour_id', DB::raw('count(*) as total'))
            ->groupBy('tour_id')
            ->pluck('total', 'tour_id');
        // view home review tour
        $show_review_tour = ReviewTour::with('customer', 'tour')->where('rating_tour', 5)->get();
        // view show tour guider
        $guider = TourGuider::where('status_guider', 1)->where('role', 1)->get();
        // tour nổi bật
        $gettour = AddTour::with('cate_location')->whereHas('reviews', function ($query) {
            $query->where('rating_tour', '>', 4.5);
        })->withSum('reviews', 'rating_tour')->withCount('reviews')->having('reviews_count', '>=', 2)->get();
        if (Auth::check()) {
            $userId = Auth::id();
            // Tìm tất cả các tour đã được đánh giá bởi người dùng khác
            $otherUsers = DB::table('review_tour')->where('customer_id_rv', '<>', $userId)->pluck('customer_id_rv')->unique();
            // Tạo một mảng chứa độ tương đồng giữa người dùng hiện tại và từng người dùng khác
            $similarities = [];
            foreach ($otherUsers as $otherUser) {
                // Tìm các tour đã được đánh giá bởi cả người dùng hiện tại và người dùng khác
                $sharedTours = DB::table('review_tour')
                    ->whereIn('customer_id_rv', [$userId, $otherUser])
                    ->groupBy('tour_id')
                    ->havingRaw('COUNT(*) = 2')
                    ->pluck('tour_id');
                // Tính tổng điểm đánh giá của các tour đã được đánh giá bởi cả người dùng hiện tại và người dùng khác
                $sum1 = DB::table('review_tour')
                    ->where('customer_id_rv', $userId)
                    ->whereIn('tour_id', $sharedTours)
                    ->sum('rating_tour');
                $sum2 = DB::table('review_tour')
                    ->where('customer_id_rv', $otherUser)
                    ->whereIn('tour_id', $sharedTours)
                    ->sum('rating_tour');
                // Tính độ tương đồng dựa trên tổng điểm đánh giá của các tour chung
                $similarity = $sum1 * $sum2 > 0 ? ($sum1 * $sum2) / sqrt(pow($sum1, 2) + pow($sum2, 2)) : 0;
                // Lưu độ tương đồng vào mảng
                $similarities[$otherUser] = $similarity;
            }
            // Sắp xếp mảng độ tương đồng theo thứ tự giảm dần
            arsort($similarities);
            // Tạo một mảng chứa các tour được đề xuất
            $recommendations = [];
            // Lặp qua các người dùng có độ tương đồng cao nhất với người dùng hiện tại để tìm các tour họ đã đánh giá
            foreach ($similarities as $otherUser => $similarity) {
                // Bỏ qua các người dùng có độ tương đồng bằng 0
                if ($similarity == 0) {
                    continue;
                }
                // Tìm các tour đã được đánh giá bởi người dùng này và chưa được người dùng hiện tại đánh giá
                $unratedTours = DB::table('review_tour')
                    ->where('customer_id_rv', $otherUser)
                    ->whereNotIn('tour_id', function ($query) use ($userId) {
                        $query->select('tour_id')
                            ->from('review_tour')
                            ->where('customer_id_rv', $userId);
                    })->pluck('tour_id');
                // Lặp qua các tour chưa được người dùng hiện tại đánh giá và tính điểm đề xuất dựa trên độ tương đồng và điểm đánh giá của người dùng khác
                foreach ($unratedTours as $tour) {
                    $weightedSum = 0;
                    $similaritySum = 0;
                    foreach ($otherUsers as $u) {
                        // Kiểm tra xem người dùng này đã đánh giá tour này chưa
                        $rating = DB::table('review_tour')
                            ->where('customer_id_rv', $u)
                            ->where('tour_id', $tour)
                            ->value('rating_tour');
                        // Nếu người dùng đã đánh giá tour này, tính điểm đề xuất dựa trên độ tương đồng và điểm đánh giá của người dùng này
                        if ($rating !== null) {
                            $weightedSum += $similarities[$u] * $rating;
                            $similaritySum += $similarities[$u];
                        }
                    }
                    // Nếu có ít nhất một người dùng khác đã đánh giá tour này, tính điểm đề xuất và lưu vào mảng
                    if ($similaritySum > 0) {
                        $recommendations[$tour] = $weightedSum / $similaritySum;
                    }
                }
            }
            // Sắp xếp mảng đề xuất theo thứ tự giảm dần của điểm đề xuất
            arsort($recommendations);
            // Lấy ra 10 tour có điểm đề xuất cao nhất (tổng điểm reivew 4. trở lên) và trả về cho người dùng
            $recommendedTourIds = array_slice(array_keys($recommendations), 0, 10);
            $suggetTours = AddTour::with('cate_location')->whereIn('id', $recommendedTourIds)->whereHas('reviews', function ($query) {
                $query->where('rating_tour', '>', 4.0);
            })->withSum('reviews', 'rating_tour')->get();
            // show tour đề xuất
            return view('users.main_user.home', compact('suggetTours', 'guider', 'show_review_tour', 'reviewCounts', 'commentCounts', 'blogtopbinhluan', 'categoryblog', 'categorytour', 'gettour'), ['title' => 'Home']);
        } else {
            return view('users.main_user.home', compact('guider', 'show_review_tour', 'reviewCounts', 'commentCounts', 'blogtopbinhluan', 'categoryblog', 'categorytour', 'gettour'), ['title' => 'Home']);
        }
    }
    //view page contact
    public function contact_us()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_content = 'Contact';
        $title_h2 = 'Contact Us';
        return view('users.main_user.contact_us', compact('categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Contact Us']);
    }
    // view page about us
    public function about_us()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Who We Are?';
        $title_content = 'About Us';
        return view('users.main_user.about_us', compact('categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'About Us']);
    }
    // view pagae blog single
    public function blog_single(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        $title_content = 'Blog Sidebar';
        $title_h2 = 'Blog Sidebar';
        $categoryblog = DB::table('category_blog')->get();
        $getDetail_blog = AddBlog::with('cate_blog', 'user')->where('id', '=', $id)->first();
        // show comment of 1 blog
        $showcmt_blog = CommentBlog::with('customer')->where('blog_single_id', $id)->orderby('created_at', 'DESC')->get();
        // xuất blog có nhiều bình luận
        $blogtopbinhluan = AddBlog::with('cate_blog', 'user')->withCount('comments')->orderByDesc('comments_count')->take(3)->get();
        // count comment of 1 blog
        $commentCounts = CommentBlog::select('blog_single_id', DB::raw('count(*) as total'))->groupBy('blog_single_id')->pluck('total', 'blog_single_id');
        // count category blog
        $countblog = [];
        foreach ($categoryblog as $category) {
            $count = DB::table('blog')->where('category_id', $category->id)->count();
            $countblog[$category->id] = $count;
        }
        // relate blog
        if (!empty($getDetail_blog)) {
            $relate_blog = AddBlog::with('cate_blog', 'user')->where('category_id', '=', $getDetail_blog->category_id)->whereNotIn('id', [$id])->get();
            $request->session()->put('id', $id);
        } else {
            return redirect()->route('blogListSidebar')->with('error', 'Blog này không tồn tại!');
        }
        return view('users.main_user.Blog_user.blog_single', compact('commentCounts', 'blogtopbinhluan', 'showcmt_blog', 'countblog', 'relate_blog', 'categorytour', 'categoryblog', 'getDetail_blog'), ['title' => 'Blog Single'])->with(compact('title_content', 'title_h2'));
    }
    // view list blog
    public function blog_list()
    {

        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $blog = AddBlog::with('cate_blog', 'user')->where('status_blog', 1)->orderby('created_at', 'DESC')->paginate(4);
        $title_content = 'Blog List Sidebar';
        $title_h2 = 'Blog List Sidebar';
        $commentCounts = CommentBlog::select('blog_single_id', DB::raw('count(*) as total'))
            ->groupBy('blog_single_id')
            ->pluck('total', 'blog_single_id');
        $countblog = [];
        foreach ($categoryblog as $category) {
            $count = DB::table('blog')->where('category_id', $category->id)->where('status_blog', 1)->count();
            $countblog[$category->id] = $count;
        }
        //  return dd($blog[0]->cate_blog);
        return view('users.main_user.Blog_user.blog_list', compact('commentCounts', 'countblog', 'categoryblog', 'categorytour', 'blog', 'title_h2', 'title_content'), ['title' => 'Blog List Sidebar']);
    }
    // ------------------------- View blog by category list ------------------------------------------
    public function blog_list_cateogry(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Blog By Category';
        $title_content = 'Blog By Category';
        $countblog = [];
        // count comment blog
        $commentCounts = CommentBlog::select('blog_single_id', DB::raw('count(*) as total'))
            ->groupBy('blog_single_id')
            ->pluck('total', 'blog_single_id');
        // count category blog
        foreach ($categoryblog as $category) {
            $count = DB::table('blog')->where('category_id', $category->id)->where('status_blog', 1)->count();
            $countblog[$category->id] = $count;
        }
        if (!empty($id)) {
            $blog_list_by_cate = AddBlog::select('category_blog.*', 'blog.*')->orderby('blog.created_at', 'DESC')
                ->join('category_blog', 'category_blog.id', '=', 'blog.category_id')
                ->where('category_blog.id', '=', $id)->where('status_blog', 1)->paginate(4);
            return view('users.main_user.Blog_user.BlogListByCate', compact('commentCounts', 'countblog', 'categoryblog', 'categorytour', 'blog_list_by_cate', 'title_h2', 'title_content'), ['title' => 'Blog By Cateogry']);
        } else {
            return redirect()->route('blogListSidebar')->with('error', 'Liên kết không tồn tại!');
        }
    }
    // ================================= View Tour / LIST / DETAIL / LIST BY Category ==========================
    // list tour
    public function tour_list()
    {
        $categoryblog = DB::table('category_blog')->get();
        $categorytour = DB::table('category_tour')->get();
        $categorylocation = DB::table('location_tour')->get();
        $tour = AddTour::with('cate_tour','cate_location')->paginate(4);
        $title_content = 'Tour List Sidebar';
        $title_h2 = 'Tour List Sidebar';
        $counttour = [];
        foreach ($categorytour as $category) {
            $count = DB::table('tour')->where('cate_tour_id', $category->id)->count();
            $counttour[$category->id] = $count;
        }
        $countlocation = [];
        foreach ($categorylocation as $cate) {
            $count = DB::table('tour')->where('location_tour_id', $cate->id)->count();
            $countlocation[$cate->id] = $count;
        }
        $reviewCounts = ReviewTour::select('tour_id', DB::raw('count(*) as total'))
            ->groupBy('tour_id')
            ->pluck('total', 'tour_id');
        return view('users.main_user.Tour_user.ListTourSidebar', compact('countlocation','categorylocation','reviewCounts', 'counttour', 'categorytour', 'categoryblog', 'tour', 'title_h2', 'title_content'), ['title' => 'Tour List Sidebar']);
    }
    public function tour_list_cateogry(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        // ----------------- Show view category blog at header ------------------
        $categoryblog = DB::table('category_blog')->get();
        $categorylocation = DB::table('location_tour')->get();
        $title_h2 = 'Tour By Category';
        $title_content = 'Tour By Category';
        $counttour = [];
        foreach ($categorytour as $category) {
            $count = DB::table('tour')->where('cate_tour_id', $category->id)->count();
            $counttour[$category->id] = $count;
        }
        $countlocation = [];
        foreach ($categorylocation as $cate) {
            $count = DB::table('tour')->where('location_tour_id', $cate->id)->count();
            $countlocation[$cate->id] = $count;
        }
        if (!empty($id)) {
            $reviewCounts = ReviewTour::select('tour_id', DB::raw('count(*) as total'))
                ->groupBy('tour_id')
                ->pluck('total', 'tour_id');
            $tour_list_by_cate = AddTour::with('cate_tour','cate_location')->select('category_tour.*', 'tour.*')
                ->join('category_tour', 'category_tour.id', '=', 'tour.cate_tour_id')
                ->where('category_tour.id', '=', $id)->paginate(4);
            return view('users.main_user.Tour_user.ListTourByCate', compact('countlocation','categorylocation','reviewCounts', 'counttour', 'categoryblog', 'categorytour', 'tour_list_by_cate', 'title_h2', 'title_content'), ['title' => 'Tour By Cateogry']);
        } else {
            return redirect()->route('TourListSidebar')->with('error', 'Liên kết không tồn tại!');
        }
    }
    public function tour_list_location(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        // ----------------- Show view category blog at header ------------------
        $categoryblog = DB::table('category_blog')->get();
        $categorylocation = DB::table('location_tour')->get();
        $title_h2 = 'Tour By Location';
        $title_content = 'Tour By Location';
        $counttour = [];
        foreach ($categorytour as $category) {
            $count = DB::table('tour')->where('cate_tour_id', $category->id)->count();
            $counttour[$category->id] = $count;
        }
        $countlocation = [];
        foreach ($categorylocation as $cate) {
            $count = DB::table('tour')->where('location_tour_id', $cate->id)->count();
            $countlocation[$cate->id] = $count;
        }
        if (!empty($id)) {
            $reviewCounts = ReviewTour::select('tour_id', DB::raw('count(*) as total'))
                ->groupBy('tour_id')
                ->pluck('total', 'tour_id');
            $tour_list_by_loca = AddTour::with('cate_tour','cate_location')->select('location_tour.*', 'tour.*')
                ->join('location_tour', 'location_tour.id', '=', 'tour.location_tour_id')
                ->where('location_tour.id', '=', $id)->paginate(4);
            return view('users.main_user.Tour_user.ListTourLocation', compact('countlocation','categorylocation','reviewCounts', 'counttour', 'categoryblog', 'categorytour', 'tour_list_by_loca', 'title_h2', 'title_content'), ['title' => 'Tour By Location']);
        } else {
            return redirect()->route('TourListSidebar')->with('error', 'Liên kết không tồn tại!');
        }
    }
    // tour single
    public function tour_single(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Tour Single';
        $title_content = 'Tour Single';
        $guide_tour = TourGuider::where('role',0)->get();
        $getDetail_tour = AddTour::with('cate_location')->where('id', '=', $id)->first();
        // total number of people register of 1 tour
        $regis_people_count = BookTour::where('tour_id', $id)->sum('Regis_number');
        // count review of 1 tour
        $reviewCount = $getDetail_tour->reviews()->count();
        // show review of 1 tour 
        $show_cmt_tour = ReviewTour::with('customer')->where('tour_id', $id)->get();
        // sum rating
        $rating = ReviewTour::where('tour_id', $id)->avg('rating_tour');
        $rating = number_format($rating, 1);
        // relate of 1 tour
        if (!empty($getDetail_tour)) {
            $relate_tour = AddTour::where('cate_tour_id', '=', $getDetail_tour->cate_tour_id)->whereNotIn('id', [$id])->get();
            $request->session()->put('id', $id);
            $tour_gallery = AddGalleryTour::select('tour.*', 'gallery_tour.*')
                ->join('tour', 'tour.id', '=', 'gallery_tour.tour_id')
                ->where('tour.id', '=', $id)->get();
        } else {
            return redirect()->route('TourListSidebar')->with('error', 'Tour này không tồn tại!');
        }
        return view('users.main_user.Tour_user.TourSingle', compact('guide_tour','rating', 'reviewCount', 'show_cmt_tour', 'regis_people_count', 'tour_gallery', 'relate_tour', 'categorytour', 'categoryblog', 'getDetail_tour'), ['title' => 'Tour Single'])->with(compact('title_content', 'title_h2'));
    }
    // =========================== Tour guider ====================================
    // view list tour guider
    public function list_tour_guider()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
    
        $title_h2 = 'Hire Guider';
        $title_content = 'Hire Guider';
        // get detail guider
        $getdetail_guider = TourGuider::paginate(4);
        return view('users.main_user.Guider_user.ListGuider', compact('getdetail_guider', 'categorytour', 'categoryblog', 'title_content', 'title_h2'), ['title' => 'Hire Guider']);
    }
    public function view_guider(Request $request, $id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Hire Guider';
        $title_content = 'Hire Guider';
        // view detail guider
        $view_detail_guider = TourGuider::where('id', $id)->first();
        // guider nổi bật
        $guider = TourGuider::withCount('reviews')->orderByDesc('reviews_count')->where('status_guider', 1)->whereNotIn('id', [$id])->take(5)->get();
        // count review of 1 tour
        $reviewCount = $view_detail_guider->reviews()->count();
        // show review of 1 guider
        $show_cmt_guider = ReviewGuider::with('customer')->where('guider_id', $id)->get();
        // sum rating
        $rating = ReviewGuider::where('guider_id', $id)->avg('rating_guider');
        $rating = number_format($rating, 1);
        // total number of people register of 1 tour
        $total_day_count = BookGuider::where('guider_id', $id)->sum('total_day');
        // cout customer book guider
        $count_cus_book = BookGuider::where('guider_id', $id)->where('status_bookguider', 3)->count();
        return view('users.main_user.Guider_user.ViewGuider', compact('count_cus_book', 'total_day_count', 'rating', 'reviewCount', 'show_cmt_guider', 'guider', 'view_detail_guider', 'categorytour', 'categoryblog', 'title_content', 'title_h2'), ['title' => 'Hire Guider']);
    }
    // view sign of guider
    public function get_view_sign_guider(Request $request)
    {
        $guiderId = $request->input('guiderid');
        $get_sign_guider = BookGuider::where('guider_id', $guiderId)->where('status_bookguider', 2)->get();
        return response()->json($get_sign_guider);
    }
}
