<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AddTour;
use App\Models\CommentBlog;
use App\Models\Admin\AddBlog;
use GuzzleHttp\Client;
use App\Models\ReviewTour;

class SearchController extends Controller
{
    // search tour
    public function search_tour()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // $tour = AddTour::search($search)->paginate(4);
            $tour = AddTour::with(['cate_location' => function ($query) use ($search) {
                $query->select('id', 'location_name');
            }])
                ->join('location_tour', 'location_tour.id', '=', 'tour.location_tour_id')
                ->whereRaw("MATCH(tour.tourname) AGAINST(? IN BOOLEAN MODE) OR MATCH(location_tour.location_name) AGAINST(? IN BOOLEAN MODE)", [$search, $search])
                ->orWhere('location_tour.location_name', 'LIKE', '%' . $search . '%')
                ->orWhere('tourname', 'LIKE', '%' . $search . '%')->paginate(4);
            $categoryblog = DB::table('category_blog')->get();
            $categorytour = DB::table('category_tour')->get();
            $title_content = 'Tour Search';
            $title_h2 = 'Tour Search';
            $categorylocation = DB::table('location_tour')->get();
            $countlocation = [];
            foreach ($categorylocation as $cate) {
                $count = DB::table('tour')->where('location_tour_id', $cate->id)->count();
                $countlocation[$cate->id] = $count;
            }
            $counttour = [];
            foreach ($categorytour as $category) {
                $count = DB::table('tour')->where('cate_tour_id', $category->id)->count();
                $counttour[$category->id] = $count;
            }
            $reviewCounts = ReviewTour::select('tour_id', DB::raw('count(*) as total'))
            ->groupBy('tour_id')
            ->pluck('total', 'tour_id');
            return view('users.main_user.Tour_user.SearchTour', compact('countlocation','categorylocation','reviewCounts','search', 'counttour', 'categorytour', 'categoryblog', 'tour', 'title_h2', 'title_content'), ['title' => 'Tour Search']);
        } else {
            return redirect()->route('home');
        }
    }
    // search blog
    public function search_blog()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $categorytour = DB::table('category_tour')->get();
            $categoryblog = DB::table('category_blog')->get();
            $blog = AddBlog::with('cate_blog', 'user')->where('title', 'LIKE', '%' . $search . '%')->paginate(4);
            $title_content = 'Blog List Sidebar';
            $title_h2 = 'Blog List Sidebar';
            $countblog = [];
            $commentCounts = CommentBlog::select('blog_single_id', DB::raw('count(*) as total'))
                ->groupBy('blog_single_id')
                ->pluck('total', 'blog_single_id');
            foreach ($categoryblog as $category) {
                $count = DB::table('blog')->where('category_id', $category->id)->count();
                $countblog[$category->id] = $count;
            }
            //  return dd($blog[0]->cate_blog);
            return view('users.main_user.Blog_user.SearchBlog', compact('search', 'commentCounts', 'countblog', 'categoryblog', 'categorytour', 'blog', 'title_h2', 'title_content'), ['title' => 'Blog List Sidebar']);
        } else {
            return redirect()->route('home');
        }
    }
    public function search_tour_api(Request $request)
    {
        // Lấy file ảnh từ request
        $image = $request->file('searchanh');
        // Nếu không có ảnh được tải lên
        if (!$image) {
            return redirect()->back()->with(['error' => 'Vui lòng chọn ảnh']);
        }
        // Tạo đường dẫn cho file ảnh
        $path = $image->store('uploads');
        // Lấy đường dẫn tuyệt đối cho file ảnh
        $absolutePath = storage_path("app/$path");
        // Đọc nội dung của file ảnh
        $imageContent = file_get_contents($absolutePath);
        // Tạo request đến API của Google để tìm kiếm tour
        $client = new Client(['base_uri' => 'https://www.googleapis.com/']);
        $response = $client->request('POST', 'https://vision.googleapis.com/v1/images:annotate', [
            'query' => ['key' => 'AIzaSyBGRVqdGox0eb0PP3IqYl4F8QagdaJVRKU'],
            'json' => [
                'requests' => [
                    [
                        'image' => [
                            'content' => base64_encode($imageContent)
                        ],
                        'features' => [
                            [
                                'type' => 'WEB_DETECTION',
                                'maxResults' => 1
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        // Lấy kết quả trả về từ API
        $results = json_decode($response->getBody()->getContents(), true);
        // Lấy ra các kết quả phù hợp nhất với hình ảnh
        $bestGuessLabels = $results['responses'][0]['webDetection']['bestGuessLabels'];
        // Nếu không tìm thấy kết quả nào phù hợp
        if (empty($bestGuessLabels)) {
            return redirect()->back()->with(['error' => 'Không tìm thấy kết quả phù hợp']);
        }
        // Lấy tên tour từ kết quả phù hợp nhất
        $search = $bestGuessLabels[0]['label'];
        unlink($absolutePath);
        $tour = AddTour::with(['cate_location' => function ($query) use ($search) {
            $query->select('id', 'location_name');
        }])
            ->join('location_tour', 'location_tour.id', '=', 'tour.location_tour_id')
            ->whereRaw("MATCH(tour.tourname) AGAINST(? IN BOOLEAN MODE) OR MATCH(location_tour.location_name) AGAINST(? IN BOOLEAN MODE)", [$search, $search])
            ->paginate(4);
        $categoryblog = DB::table('category_blog')->get();
        $categorytour = DB::table('category_tour')->get();
        $title_content = 'Tour Search';
        $title_h2 = 'Tour Search';
        $counttour = [];
        foreach ($categorytour as $category) {
            $count = DB::table('tour')->where('cate_tour_id', $category->id)->count();
            $counttour[$category->id] = $count;
        }
        $categorylocation = DB::table('location_tour')->get();
            $countlocation = [];
            foreach ($categorylocation as $cate) {
                $count = DB::table('tour')->where('location_tour_id', $cate->id)->count();
                $countlocation[$cate->id] = $count;
            }
        return view('users.main_user.Tour_user.SearchTour', compact('countlocation','categorylocation','search', 'counttour', 'categorytour', 'categoryblog', 'tour', 'title_h2', 'title_content'), ['title' => 'Tour Search']);
    }
}
