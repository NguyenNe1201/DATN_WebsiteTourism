<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ProfileService;
use App\Http\Requests\Profile\EditProfileRequest;
use App\Models\BookGuider;
use  App\Models\BookTour;
use App\Models\PayMentTour;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\AddBlogService;
use App\Http\Requests\AddBlog\BlogRequest;
use App\Models\Admin\AddBlog;
use App\Models\Admin\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $AddBlogServices;
    protected $ProfileServices;
    public function __construct(AddBlogService $AddBlogServices, ProfileService $ProfileServices)
    {
        $this->AddBlogServices = $AddBlogServices;
        $this->ProfileServices = $ProfileServices;
    }
    //------------------------ View / Edit Profile of Customer ----------------------------------
    public function profile_cus()
    {

        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'My Profile';
        $title_content = 'My Profile';
        $countbooktour =  BookTour::where('customer_id', Auth::user()->id)->count();
        return view('users.main_user.Profile_Cus.ProfileCustomer', compact('countbooktour', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'My Profile']);
    }
    // Edit customer
    public function upload_profile_cus(Request $request)
    {
        $result = $this->ProfileServices->update_profile($request);
        return redirect()->back();
    }
    // ========================= Add / Register Account of Customer ============================
    // add customer
    public function getadd_account_cus()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Register Customer';
        $title_content = 'Register Customer';
        return view('users.main_user.Profile_Cus.AddCustomer', compact('categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Register Customer']);
    }
    public function postadd_account_cus(EditProfileRequest $request)
    {
        $result =  $this->ProfileServices->create_account_customer($request);
        return redirect()->route('home');
    }
    //  view book tour history
    public function get_tourbook_history()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $gettour = DB::table('tour')->get();
        $getpayment_tour = PayMentTour::get();
        $title_h2 = 'Tour Book History';
        $title_content = 'Tour Book History';
        $id_cus = Auth::user()->id;
        $getSignUpTour = BookTour::with('customer', 'tour', 'payment', 'reviews','tour_location','guider_tour')->orderby('created_at', 'DESC')->where('customer_id', '=', $id_cus)->get();

        // return dd($getSignUpTour[0]->tour);
        return view('users.main_user.Profile_Cus.TourBookHistory', compact('getpayment_tour', 'gettour', 'getSignUpTour', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Tour Book History']);
    }
    // view book guider history
    public function guider_book_history()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $getpayment_tour = PayMentTour::get();
        $title_h2 = 'Guider Book History';
        $title_content = 'Guider Book History';
        $id_cus = Auth::user()->id;
        $getSignUpGuider = BookGuider::with('customer', 'guider', 'payment', 'reviews_guider')->orderby('created_at', 'DESC')->where('customer_id', '=', $id_cus)->get();
        // return dd($getSignUpTour[0]->tour);
        return view('users.main_user.Profile_Cus.BookGuiderHistory', compact('getpayment_tour', 'getSignUpGuider', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Guider Book History']);
    }
    // add blog user
    public function get_addblog_user()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Guider Book History';
        $title_content = 'Guider Book History';
        return view('users.main_user.Profile_Cus.AddBlog_user', compact('categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Add Blog User']);
    }
    public function post_addblog_user(BlogRequest $request)
    {
        $result =  $this->AddBlogServices->create_blog($request);
        return redirect()->route('home');
    }
    // list blog user
    public function list_blog_user()
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'List Blog User';
        $title_content = 'List Blog User';
        $user_id = Auth::user()->id;
        $listblog = AddBlog::with('cate_blog', 'user')->where('user_id', $user_id)->orderby('created_at', 'DESC')->get();
        return view('users.main_user.Profile_Cus.ListBlog_user', compact('listblog', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'List Blog User']);
    }
    // update password customer
    public function Get_UpdatePassWord()
    {
        $title_h2 = 'Update Password Customer';
        $title_content = 'Update Password Customer';
        return view('users.main_user.Profile_Cus.Update_password', compact('title_h2', 'title_content'), ['title' => 'Update Password Customer']);
    }
    public function Post_UpdatePassWord(Request $request)
    {
        $profile = Profile::findOrFail($request->input('profile_id'));
        $id = (int)$request->input('profile_id');
        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->input('current_password'), $profile->password)) {
            FacadesSession::flash('error', 'Mật khẩu hiện tại không đúng!');
            return redirect()->back();
        }
        try {
            Profile::where('id', $id)->update([
                'password' => bcrypt($request->input('new_password'))
            ]);
            FacadesSession::flash('success', 'Cập nhật mật khẩu thành công!');
            return redirect()->back();
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    // update password admin
    public function Get_UpdatePassWord_admin(){
        $title_h2 = 'Update Pass Word';
        $title_content = 'Update Pass Word';
        return view('admin.main_adm.MyProfile.Update_password_admin', compact('title_h2', 'title_content'), ['title' => 'Update Password Admin']);  
    }
    public function Post_UpdatePassWord_admin(Request $request){
        $profile = Profile::findOrFail($request->input('profile_id'));
        $id = (int)$request->input('profile_id');
        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->input('current_password'), $profile->password)) {
            FacadesSession::flash('error', 'Mật khẩu hiện tại không đúng!');
            return redirect()->back();
        }
        try {
            Profile::where('id', $id)->update([
                'password' => bcrypt($request->input('new_password'))
            ]);
            FacadesSession::flash('success', 'Cập nhật mật khẩu thành công!');
            return redirect()->back();
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
}
