<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AddCategoryBlog;
use App\Models\Admin\AddBlog;
use App\Models\Admin\AddTour;
use App\Models\Admin\AddGalleryTour;
use App\Models\Admin\AddCategoryTour;
use App\Http\Services\AddBlogService;
use App\Http\Services\AddTourService;
use App\Http\Requests\AddBlog\CategoryBlogRequest;
use App\Http\Requests\AddBlog\BlogRequest;
use App\Http\Requests\AddTour\AddTourRequest;
use App\Http\Requests\AddTour\CategoryTourRequest;
use App\Http\Requests\AddBlog\EditCateBlogRequest;
use App\Http\Requests\AddTour\EditCateTourRequest;
use App\Models\Admin\LocationTour;
use App\Models\Admin\Profile;
use App\Models\Admin\TourGuider;
use App\Models\BookTour;
use App\Models\ReviewGuider;
use App\Models\ReviewTour;
use Illuminate\Support\Facades\File;
use App\Models\PayMentTour;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    protected $AddBlogServices;
    protected $AddTourServices;
    public function __construct(AddBlogService $AddBlogServices, AddTourService $AddTourServices)
    {
        $this->AddBlogServices = $AddBlogServices;
        $this->AddTourServices = $AddTourServices;
    }
    // View home dashboard Admin
    public function dashboard_adm()
    {
        $categorytour = DB::table('category_tour')->get();
        $cate_location = LocationTour::with('location_t')->get();
        // top location
        $topLocations = LocationTour::with(['bookTours' => function ($query) {
            $query->select('location_tour_id')
                ->selectRaw('SUM(Regis_number) as total_people')
                ->groupBy('location_tour_id');
        }])->withCount('bookTours')->withCount('location_tour')->orderBy('book_tours_count', 'desc')->get();
        // top tour
        $topTours = AddTour::with(['sign_tour' => function ($query) {
            $query->select('tour_id')
                ->selectRaw('SUM(Regis_number) as total_people')
                ->groupBy('tour_id');
        }])->withCount('sign_tour')->withSum('sign_tour', 'total_price')->orderBy('sign_tour_count', 'desc')->get();
        $total_review = ReviewTour::select(
            'id',
            'tour_id',
            DB::raw('AVG(rating_tour) as average_rating'),
            DB::raw('COUNT(*) as review_count')
        )
            ->groupBy('tour_id')
            ->get();
        // 
        $tour = AddTour::with('cate_tour')->withCount('sign_tour')->orderByDesc('sign_tour_count')->get();
        $customerCount = Profile::where('role', 0)->count();
        $tourCount = AddTour::count();
        $blogCount = AddBlog::count();
        $guiderCount = TourGuider::count();
        $tourSoldCount = BookTour::whereIn('status', [2, 3])->count();
        $reviewCount = ReviewTour::count();
        $reviewCount_guider = ReviewGuider::count();
        $bookTourCount = BookTour::where('status', 1)->count();
        $total_revenue = PayMentTour::where('status_payment', 1)->sum('payment_amount');
        return view('admin.main_adm.home_dashboard', compact('total_review', 'topTours', 'topLocations', 'cate_location', 'tour', 'categorytour', 'total_revenue', 'bookTourCount', 'reviewCount_guider', 'guiderCount', 'reviewCount', 'tourSoldCount', 'customerCount', 'tourCount', 'blogCount'), ['title' => 'Admin Dashboard']);
    }
    // ------------------------------------------ Add / Delete / Edit Category Blog ------------------------------------
    // add category blog
    public function store_categoryblog(CategoryBlogRequest $request)
    {
        $result =  $this->AddBlogServices->create_category_blog($request);
        return redirect()->back();
    }
    //delete category = checkbox
    public function deleteCategoryBlog_checkbox(Request $request)
    {
        $ids = $request->id;
        DB::table('category_blog')->whereIn('id', $ids)->delete();
        $success = 'Xóa danh mục thành công!';
        return redirect()->route('ListCategoryBlog')->with('success', $success);
    }
    // Edit  category blog
    public function getedit_category_blog($id = 0)
    {
        $editcategoryblog = AddCategoryBlog::where('id', '=', $id)->get();
        return response()->json([
            'category_blog_get' => $editcategoryblog
        ]);
    }
    public function postedit_category_blog(EditCateBlogRequest $request)
    {
        $result = $this->AddBlogServices->update_category_blog($request);
        return redirect()->back();
    }
    //list category blog
    public function list_category_blog()
    {
        $categoryblog = AddCategoryBlog::get();
        return view('admin.main_adm.Blog_adm.list_cate_blog', compact('categoryblog'), ['title' => 'List Category Blog']);
    }
    //view show add main blog single
    public function blog()
    {
        $categoryblog = DB::table('category_blog')->get();
        return view('admin.main_adm.Blog_adm.add_blog', compact('categoryblog'), ['title' => 'Add Blog']);
    }
    // add blog post
    public function store_blog(BlogRequest $request)
    {
        //dd($request->input());
        $result =  $this->AddBlogServices->create_blog($request);
        return redirect()->route('ListBlogContent');
    }
    // ----------------------------------------- List Blog / Edit Blog / Delete Blog -------------------------------------------------
    public function list_blog_content()
    {
        $listblog = AddBlog::with('cate_blog')->orderby('created_at', 'DESC')->get();
        $categoryblog = DB::table('category_blog')->get();
        $Path = public_path() . "/json_file/";
        if (!is_dir($Path)) {
            mkdir($Path, 0777, true);
        }
        File::put($Path . 'blog.json', json_encode($listblog));
        return view('admin.main_adm.Blog_adm.list_blog_content', compact('listblog', 'categoryblog'), ['title' => 'List Category Blog']);
    }
    // delete content blog
    public function delete_blog_content($id)
    {
        $data = []; // khởi tạo mảng data chứa $error và $success
        if (!empty($id)) {
            $deteBlog = AddBlog::where('id', $id)->get();
            if (!empty($deteBlog[0])) {
                $deleteStatus = DB::table('blog')->where('id', $id)->delete();
                if ($deleteStatus) {
                    $data['success'] = 'Xóa Blog thành công!';
                } else {
                    $data['error'] = 'Bạn không thể xóa. Vui lòng thử lại!';
                }
            } else {
                $data['error'] = 'Blog không tồn tại!';
            }
        } else {
            $data['error'] = 'Link này không tồn tại!';
        }
        return redirect()->back()->with($data);
    }
    // edit blog
    public function getedit_blog(Request $request, $id = 0)
    {
        $categoryblog = AddCategoryBlog::get();
        if (!empty($id)) {
            $editBlog = AddBlog::where('id', $id)->get();
            if (!empty($editBlog[0])) {
                $request->session()->put('id', $id);
                $editBlog = $editBlog[0];
            } else {
                return redirect()->route('ListBlogContent')->with('error', 'Blog không tồn tại!');
            }
        } else {
            return redirect()->route('ListBlogContent')->with('error', 'Liên kết không tồn tại!');
        }
        return view('admin.main_adm.Blog_adm.edit_blog', compact('editBlog', 'categoryblog'), ['title' => 'Edit Blog']);
    }
    public function post_editblog(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $request->validate([
            'category_id',
            'title',
            'content_blog',
            'img_title',
            'img_title_1',
            'img_title_2',
        ], []);
        $result = $this->AddBlogServices->update_blog($request, $id);
        return redirect()->route('ListBlogContent');
    }
    // edit status blog
    public function update_status_blog(Request $request)
    {
        $result = $this->AddBlogServices->update_blog_status($request);
        return redirect()->back();
    }
    // =============================== ADD / EDIT / LIST Category Tour ================================
    public function list_cate_tour()
    {
        $category_tour = AddCategoryTour::get();
        $cate_location = LocationTour::get();
        return view('admin.main_adm.Tour_adm.List_Cate_Tour', compact('cate_location', 'category_tour'), ['title' => 'Add Category Tour']);
    }
    // add category tour
    public function store_category_tour(CategoryTourRequest $request)
    {
        $result =  $this->AddTourServices->create_category_tour($request);
        return redirect()->back();
    }
    //  add location tour
    public function store_location_tour(Request $request)
    {
        LocationTour::create([
            'location_name' => (string)$request->input('location_name'),
        ]);
        return redirect()->back()->with('success', 'tạo địa điểm thành công!');
    }
    // edit location
    public function edit_location_tour(Request $request)
    {
        $id = (int)$request->input('location_id');
        LocationTour::where('id', $id)->update([
            'location_name' => (string)$request->input('location_name'),
        ]);
        return redirect()->back()->with('success', 'chỉnh sửa địa điểm thành công!');
    }
    // delete location tour
    public function delete_location_tour($id)
    {
        $data = []; // khởi tạo mảng data chứa $error và $success
        if (!empty($id)) {
            $deteLocation = LocationTour::where('id', $id)->get();
            if (!empty($deteLocation[0])) {
                $deleteStatus = DB::table('location_tour')->where('id', $id)->delete();
                if ($deleteStatus) {
                    $data['success'] = 'Xóa địa điểm thành công!';
                } else {
                    $data['error'] = 'Bạn không thể xóa. Vui lòng thử lại!';
                }
            } else {
                $data['error'] = 'Địa điểm này không tồn tại!';
            }
        } else {
            $data['error'] = 'Link này không tồn tại!';
        }
        return redirect()->back()->with($data);
    }
    // edit
    public function getedit_category_tour($id = 0)
    {
        $editcategorytour = AddCategoryTour::where('id', '=', $id)->get();
        return response()->json([
            'category_tour_get' => $editcategorytour
        ]);
    }
    public function postedit_category_tour(EditCateTourRequest $request)
    {
        $result = $this->AddTourServices->update_category_blog($request);
        return redirect()->back();
    }
    // delete = checkbox
    public function deleteCategoryTour_checkbox(Request $request)
    {
        $ids = $request->id;
        DB::table('category_tour')->whereIn('id', $ids)->delete();
        $success = 'Xóa danh mục thành công!';
        return redirect()->route('ListCategoryTour')->with('success', $success);
    }
    // ---------------------------- ADD / EDIT / LIST / DELETE Tour ---------------------------------
    public function tour()
    {
        $cate_tour = DB::table('category_tour')->get();
        $cate_location = LocationTour::get();
        $guider = DB::table('tour_guider')->where('role',0)->where('status_guider',1)->get();
        return view('admin.main_adm.Tour_adm.add_tour', compact('guider','cate_location', 'cate_tour'), ['title' => 'Add Tour']);
    }
    // Add tour
    public function store_tour(AddTourRequest $request)
    {
        $result =  $this->AddTourServices->create_tour($request);
        return redirect()->route('ListTour');
    }
    // List tour
    public function list_tour()
    {
        $listtour = AddTour::with('cate_location')->orderby('created_at', 'DESC')->get();
        // $guider = TourGuider::where('role',0)->get();
        $desttinationPath = public_path() . "/json_file/";
        if (!is_dir($desttinationPath)) {
            mkdir($desttinationPath, 0777, true);
        }
        File::put($desttinationPath . 'tour.json', json_encode($listtour));
        return view('admin.main_adm.Tour_adm.list_tour', compact('listtour'), ['title' => 'List Tour']);
    }
    // Delete tour
    public function delete_tour($id)
    {
        if (!empty($id)) {
            // Xóa tour với id tương ứng
            $tour = AddTour::find($id);
            if ($tour) {
                $tour->delete();
                // Xóa các ảnh trong thư mục và dữ liệu trong bảng AddGalleryTour có tour_id tương ứng với tour vừa xóa
                $gallery = AddGalleryTour::where('tour_id', $id)->get();
                foreach ($gallery as $item) {
                    $imagePath = 'storage/photos/1/gallery/' . $item->gallery_img;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $item->delete();
                }
                return redirect()->route('ListTour')->with('success', 'Xóa Tour và Ảnh Thành Công');
            } else {
                return redirect()->route('ListTour')->with('error', 'Tour không tồn tại');
            }
        } else {
            return redirect()->back()->with('error', 'Link không tồn tại');
        }
    }
    // Edit tour
    public function getedit_tour(Request $request, $id = 0)
    {
        $cate_tour = AddCategoryTour::get();
        $cate_location = LocationTour::get();
        $guider = DB::table('tour_guider')->where('status_guider', 0)->where('role',0)->get();
        $guider1 = DB::table('tour_guider')->where('status_guider', 1)->where('role',0)->get();
        if (!empty($id)) {
            $editTour = DB::table('tour')->where('id', $id)->get();
            if (!empty($editTour[0])) {
                $request->session()->put('id', $id);
                $editTour = $editTour[0];
            } else {
                return redirect()->route('ListTour')->with('error', 'Tour không tồn tại!');
            }
        } else {
            return redirect()->route('ListTour')->with('error', 'Liên kết không tồn tại!');
        }
        return view('admin.main_adm.Tour_adm.edit_tour', compact('guider1','guider','cate_location', 'editTour', 'cate_tour'), ['title' => 'Edit Tour']);
    }
    public function postedit_tour(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $request->validate([
            'cate_tour_id',
            'tourname',
            'location_t',
            'location_url',
            'introduce_t',
            'describe_t',
            'tourplan',
            'tour_date',
            'price',
        ], []);
        $result = $this->AddTourServices->update_tour($request, $id);
        return redirect()->route('ListTour');
    }
    // ----------------------- ADD / EDIT / DELETE Gallery of tour ------------------------------------------
    public function getadd_gallery($id)
    {
        $tour_id = $id;
        $tour = AddTour::get();
        $gallery = AddGalleryTour::with('tour_name')->where('tour_id', $tour_id)->get();
        return view('admin.main_adm.Tour_adm.add_galleryTour', compact('tour_id', 'gallery', 'tour'), ['title' => 'Add Gallery Tour']);
    }
    // Add gallery tour
    public function postadd_gallery(Request $request)
    {
        $tour_id = (int)$request->input('tour_id');
        $get_image = $request->file('file_gallery');
        if ($get_image) {
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move('storage/photos/2/gallery', $new_image);
                $gallery = new AddGalleryTour();
                $gallery->tour_id = $tour_id;
                $gallery->gallery_name = $new_image;
                $gallery->gallery_img = $new_image;
                $gallery->save();
            }
        }
        return redirect()->back()->with('success', 'Thêm ảnh vào thư viện thành công!!');
    }
    // ------------------------------------ List Gallery Tour ------------------------------------------------
    public function list_gallerytour()
    {
        $list_gallery_tour = AddGalleryTour::with('tour_name')->get();
        $tour = AddTour::get();
        return view('admin.main_adm.Tour_adm.List_GalleryTour', compact('list_gallery_tour', 'tour'), ['title' => 'List Gallery Tour']);
    }
    public function edit_name_gallery(Request $request)
    {
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = AddGalleryTour::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }
    // Delete gallery tour
    public function delete_gallery($id)
    {
        if (!empty($id)) {
            $delegallery = AddGalleryTour::find($id);
            $imagePath = 'storage/photos/1/gallery/' . $delegallery->gallery_img;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $delegallery->delete();
        }
        return redirect()->back()->with('success', 'Xóa Ảnh Thành Công');
    }
    // Delete gallery tour = checkbox
    public function deleteGalleryTour_checkbox(Request $request)
    {
        $ids = $request->id;
        // Lấy danh sách bộ sưu tập hình ảnh theo các ID được chọn
        $delegalleries = AddGalleryTour::whereIn('id', $ids)->get();
        // Xóa hình ảnh và bản ghi tương ứng trong cơ sở dữ liệu
        foreach ($delegalleries as $delegallery) {
            $imagePath = 'storage/photos/1/gallery/' . $delegallery->gallery_img;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $delegallery->delete();
        }
        // Chuyển hướng trang về danh sách bộ sưu tập hình ảnh
        $success = 'Xóa ảnh thành công!';
        return redirect()->route('ListGalleryTour')->with('success', $success);
    }
    // ---------------------------- THỐNG KÊ BIỂU ĐỒ CHART -----------------------------
    // thống kê theo ngày
    public function post_filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = PayMentTour::whereBetween('payment_date', [$from_date, $to_date])->where('status_payment', 1)->orderBy('payment_date', 'ASC')->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->payment_date,
                'price' => $val->payment_amount
            );
        }
        return response()->json($chart_data);
    }
    // thống kê theo danh mục   
    public function post_filter_by_category(Request $request)
    {
        $data = $request->all();
        $id_cate = $data['id_category_tour'];
        $tours = AddTour::with('cate_tour')->withCount('sign_tour')->where('cate_tour_id', $id_cate)->orderByDesc('sign_tour_count')->get();

        return response()->json($tours);
    }
    // thống kê top location
    // public function post_filter_by_location(Request $request)
    // {
    //     $data = $request->all();
    //     if ($data['dashboard_value'] == 'toplocation') {
    //         $topLocation = LocationTour::with(['bookTours' => function ($query) {
    //             $query->select('location_tour_id')
    //                 ->selectRaw('SUM(Regis_number) as total_people')
    //                 ->groupBy('location_tour_id');
    //         }])->withCount('bookTours')->orderBy('book_tours_count', 'desc')->get();
    //     } elseif ($data['dashboard_value'] == 'toptour') {
    //     }
    //     return response()->json(['top_locations' => $topLocation]);
    // }
}
