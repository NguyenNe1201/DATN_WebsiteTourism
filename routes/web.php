<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Home\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\MyProfileController;
use App\Http\Controllers\Customer\LoginCustomerController;
use App\Http\Controllers\Customer\LogoutCustomerController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\BookTourController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogoutAdminController;
use App\Http\Controllers\UploadController;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\Admin\BookManagerController;
use App\Http\Controllers\Customer\CmtBlogController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Home\SearchController;
use App\Http\Controllers\Admin\TourGuiderController;
use App\Http\Controllers\Customer\BookGuiderController;
use App\Http\Controllers\Home\FavoriteTourController;
// Admin Dashbord
Route::prefix('admin')->group(function () {
    Route::get('/logout', [LogoutAdminController::class, 'perform'])->name('logout');
    Route::get('/login', [LoginAdminController::class, 'index'])->name('login');
    Route::post('/login/strore', [LoginAdminController::class, 'store'])->name('login_admin');
    // các tuyến đường được bảo vệ ở đây
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/main', [DashboardController::class, 'dashboard_adm'])->name('admin');
        #chart thống kê 
        Route::post('/filter-by-date', [DashboardController::class, 'post_filter_by_date'])->name('FilterByDate');
        Route::post('/filter-by-category', [DashboardController::class, 'post_filter_by_category'])->name('FilterByCategory');
        Route::post('/filter-by-location', [DashboardController::class, 'post_filter_by_location'])->name('FilterByLocation');
        # add guider sign tour
        Route::get('/add_guider_signtour/{sign_tour_id}', [BookManagerController::class, 'get_id_guider'])->name('Get_id_guider');
        Route::post('/add_guider_signtour', [BookManagerController::class, 'post_id_guider'])->name('Post_id_guider');
        #list category
        Route::prefix('/list_categoryblog')->group(function () {
            Route::get('/', [DashboardController::class, 'list_category_blog'])->name('ListCategoryBlog');
            #delete category blog = checkbox
            Route::delete(('/delete'), [DashboardController::class, 'deleteCategoryBlog_checkbox'])->name('delete_CategoryBlog');
            #add category_blog
            Route::post('/inputcategoryblog', [DashboardController::class, 'store_categoryblog'])->name('inputaddCetegoryBlog');
            #edit 1 category blog
            Route::get(('/edit_categoryblog/{id}'), [DashboardController::class, 'getedit_category_blog'])->name('GetCategory_Blog');
            Route::post(('/edit_categoryblog'), [DashboardController::class, 'postedit_category_blog'])->name('EditCategory_Blog');
        });
        # add main blog
        Route::prefix('/addblog')->group(function () {
            Route::get('/inputblog', [DashboardController::class, 'blog'])->name('addBlog');
            Route::post('/inputblog', [DashboardController::class, 'store_blog'])->name('inputaddBlog');
        });
        #list blog main content
        Route::prefix('/list_blog_content')->group(function () {
            Route::get('/', [DashboardController::class, 'list_blog_content'])->name('ListBlogContent');
            #delete blog
            Route::get(('/delete/{id}'), [DashboardController::class, 'delete_blog_content'])->name('delBlog');
            #edit upload blog
            Route::get(('/editblog/{id}'), [DashboardController::class, 'getedit_blog'])->name('GetEdit_Blog');
            Route::post(('/updateblog'), [DashboardController::class, 'post_editblog'])->name('PostEdit_Blog');
            # edit status blog
            Route::post(('/update_status_blog'), [DashboardController::class, 'update_status_blog'])->name('update_status_blog');
        });
        # List / Add category tour
        Route::prefix('/list_category_tour')->group(function () {
            Route::get('/', [DashboardController::class, 'list_cate_tour'])->name('ListCategoryTour');
            # add 
            Route::post('/add_cate_tour', [DashboardController::class, 'store_category_tour'])->name('inputCateTour');
            # edit 
            Route::get(('/edit_category_tour/{id}'), [DashboardController::class, 'getedit_category_tour'])->name('GetCategory_tour');
            Route::post(('/edit_category_tour'), [DashboardController::class, 'postedit_category_tour'])->name('EditCategory_tour');
            # delete
            Route::delete(('/delete_category_tour'), [DashboardController::class, 'deleteCategoryTour_checkbox'])->name('delete_CategoryTour');
        });
        # add main tour
        Route::prefix('/addtour')->group(function () {
            Route::get('/inputtour', [DashboardController::class, 'tour'])->name('addTour');
            Route::post('/inputtour', [DashboardController::class, 'store_tour'])->name('inputaddTour');
            Route::post('/input-location-tour', [DashboardController::class, 'store_location_tour'])->name('inputaddLocationTour');
            Route::post('/edit-location-tour', [DashboardController::class, 'edit_location_tour'])->name('editLocationTour');
            Route::get('/delete-location-tour/{id}', [DashboardController::class, 'delete_location_tour'])->name('delLocation');

        });
        # list tour and add gallery of tour
        Route::prefix('/list_tour')->group(function () {
            Route::get('/', [DashboardController::class, 'list_tour'])->name('ListTour');
            #delete tour
            Route::get(('/delete_tour/{id}'), [DashboardController::class, 'delete_tour'])->name('delTour');
            #edit upload tour
            Route::get(('/edittour/{id}'), [DashboardController::class, 'getedit_tour'])->name('GetEdit_Tour');
            Route::post(('/updatetour'), [DashboardController::class, 'postedit_tour'])->name('PostEdit_Tour');
            #add gallery of tour
            Route::get(('/addgallery/{id}'), [DashboardController::class, 'getadd_gallery'])->name('AddGallery_Tour');
            Route::post(('/insertgallery'), [DashboardController::class, 'postadd_gallery'])->name('PostGallery_Tour');
            #edit gallery name
            Route::post(('/update-gallery-name'), [DashboardController::class, 'edit_name_gallery'])->name('Edit_name_Tour');
        });
        # List gallery tour
        Route::prefix('/list_gallery_tour')->group(function () {
            Route::get('/', [DashboardController::class, 'list_gallerytour'])->name('ListGalleryTour');
            Route::get(('/delete_gallery/{id}'), [DashboardController::class, 'delete_gallery'])->name('Delete_Gallery');
            #delete category blog = checkbox
            Route::delete(('/delete-gallery-tour'), [DashboardController::class, 'deleteGalleryTour_checkbox'])->name('Delete_GalTour');
        });
        # My Profile
        Route::prefix('/my_profile')->group(function () {
            Route::get('/', [MyProfileController::class, 'my_profile'])->name('MyProfile_admin');
            Route::post(('/update_profile'), [MyProfileController::class, 'postedit_profile'])->name('PostEdit_Profile');
        });
        # Book Tour Manager
        Route::prefix('/booking_manager')->group(function () {
            Route::get('/', [BookManagerController::class, 'list_book_tour_manager'])->name('ListBookTourManager');
            # delele book tour
            Route::get('/delete_book_tour/{booktour_id}', [BookManagerController::class, 'delete_book_tour'])->name('GetDeleteBookTour');
            Route::post(('/update_status_payment'), [BookManagerController::class, 'update_status_payment'])->name('UpStattusPayment');
            # view
            Route::get('/list_book_guider', [BookManagerController::class, 'list_book_guider_manager'])->name('ListBookGuiderManager');
            #delete book guider 
            Route::get(('/delete_book_guider/{bookguider_id}'), [BookManagerController::class, 'delete_book_guider'])->name('delete_book_guider');
        });
        # Tour Guider
        Route::prefix('/tour_guider')->group(function () {
            Route::get('/inputguider', [TourGuiderController::class, 'get_add_tour_guider'])->name('get_add_tour_guider');
            Route::post('/inputguider', [TourGuiderController::class, 'post_tour_guider'])->name('post_tour_guider');
            Route::get('/list_guider', [TourGuiderController::class, 'get_list_guider'])->name('get_list_guider');
            Route::get('/delete_guider/{id}', [TourGuiderController::class, 'get_delete_guider'])->name('get_delete_guider');
            #edit tour guider
            Route::get(('/edit_guider/{id}'), [TourGuiderController::class, 'getedit_guider'])->name('GetEdit_Guider');
            Route::post(('/edit_guider'), [TourGuiderController::class, 'postedit_guider'])->name('PostEdit_Guider');
            # update status online/offline guider
            Route::post(('/update_status_guider'), [TourGuiderController::class, 'update_status_guider'])->name('update_status_guider');
        });
         #update password admin
         Route::get('/update_password', [ProfileController::class, 'Get_UpdatePassWord_admin'])->name('UpdatePassWord_admin');
         Route::post('/post_update_password_admin', [ProfileController::class, 'Post_UpdatePassWord_admin'])->name('PostUpdatePassWord_admin');
    });
});

//======================================= Main Home =========================================================
Route::get('/', function () {
    return redirect()->route('home');
});
// ================================== Login/Logout Customer =============================================
Route::get('/logout_cus', [LogoutCustomerController::class, 'perform_cus'])->name('logout_cus');
Route::post('/login_cus/strore_cus', [LoginCustomerController::class, 'store_cus'])->name('loginStore_cus');
Route::get('/check_login_cus', [LoginCustomerController::class, 'checkLoginCus'])->name('CheckLogin_Cus');
// ========================================= HOME ================================================================
Route::prefix('/home')->group(function () {
    # Register Account Customer
    Route::get('/add_account_cus', [ProfileController::class, 'getadd_account_cus'])->name('GetAddCus');
    Route::post(('/post_add_account_cus'), [ProfileController::class, 'postadd_account_cus'])->name('PostAddCus');
    # Middleware Customer
    Route::middleware(['auth', 'customer'])->group(function () {
        # profile of customer
        Route::get('/profile_customer', [ProfileController::class, 'profile_cus'])->name('Profile_Cus');
        Route::get('/tour_book_history', [ProfileController::class, 'get_tourbook_history'])->name('GetTourBookHistory');
        Route::get('/guider_book_history', [ProfileController::class, 'guider_book_history'])->name('guider_book_history');
        Route::post(('/update_profile_customer'), [ProfileController::class, 'upload_profile_cus'])->name('UploadProfileCus');
        # payment tour of customer
        Route::get('/book_tour/{tour_id}', [BookTourController::class, 'get_book_tour'])->name('GetBookTour');
        Route::post(('/sign_up_tour'), [BookTourController::class, 'post_signuptour'])->name('PostSignUpTour');
        # success payment tour    
        Route::get('/payment_push', [BookTourController::class, 'get_payment_push'])->name('GetpPaymentPush');
        # payment tour onl
        Route::get('/payment_online/{payment_id}', [BookTourController::class, 'get_payment_onl'])->name('GetPaymentOnline');
        Route::get('/vnPayCheck', [BookTourController::class, 'get_vnPayCheck'])->name('GetvnPayCheck');
        # post comment blog customer
        Route::post(('/post_comment_blog'), [CmtBlogController::class, 'post_comment_blog'])->name('post_comment_blog');
        # review tour sign up
        Route::post(('/post_review_tour'), [ReviewController::class, 'post_review_tour'])->name('post_review_tour');
        # book guider
        Route::get('/book_guider/{guider_id}', [BookGuiderController::class, 'get_book_guider'])->name('get_book_guider');
        Route::post(('/sign_up_guider'), [BookGuiderController::class, 'post_signup_guider'])->name('post_signup_guider');
       
        # check guider plan
        Route::post(('/check-guider-plan'), [BookGuiderController::class, 'get_check_guider_plan'])->name('check_guider_plan');
        # review tour sign up
        Route::post(('/post_review_guider'), [ReviewController::class, 'post_review_guider'])->name('post_review_guider');
        # add blog user
        Route::get('/addblog_user', [ProfileController::class, 'get_addblog_user'])->name('get_addblog_user');
        Route::post(('/post_addblog_user'), [ProfileController::class, 'post_addblog_user'])->name('post_addblog_user');
        # list blog user
        Route::get('/list_blog_user', [ProfileController::class, 'list_blog_user'])->name('list_blog_user');
        # favorite Tour
        Route::post('/favorite-tour', [FavoriteTourController::class, 'toggleFavoriteTour'])->name('favorite-tour.toggle');
        Route::get('/check-favorite-tour', [FavoriteTourController::class, 'checkFavoriteTour'])->name('CheckFavoriteTour');
        # favorite Blog
        Route::post('/favorite_blog', [FavoriteTourController::class, 'favorite_blog'])->name('favorite-blog');
        Route::get('/check-favorite-blog', [FavoriteTourController::class, 'checkFavoriteBlog'])->name('CheckFavoriteBlog');
        #farorite guider
        Route::post('/favorite_guider', [FavoriteTourController::class, 'favorite_guider'])->name('favorite-guider');
        Route::get('/check-favorite-guider', [FavoriteTourController::class, 'checkFavoriteGuider'])->name('CheckFavoriteGuider');
        #update password customer
        Route::get('/update_password', [ProfileController::class, 'Get_UpdatePassWord'])->name('UpdatePassWord');
        Route::post('/post_update_password', [ProfileController::class, 'Post_UpdatePassWord'])->name('PostUpdatePassWord');

    });
    # View home
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/contact', [MainController::class, 'contact_us'])->name('contactUs');
    Route::get('/about', [MainController::class, 'about_us'])->name('aboutUs');
    # View page blog
    Route::prefix('/blogdetail')->group(function () {
        Route::get('/', [MainController::class, 'blog_list'])->name('blogListSidebar');
        Route::get('/list_cate_blog/{id}', [MainController::class, 'blog_list_cateogry'])->name('blogListCategory');
        Route::get('/single/{id}', [MainController::class, 'blog_single'])->name('blogSingle');
    });
    # View page tour
    Route::prefix('/list_tour')->group(function () {
        Route::get('/', [MainController::class, 'tour_list'])->name('TourListSidebar');
        Route::get('/category_tour/{id}', [MainController::class, 'tour_list_cateogry'])->name('TourListCategory');
        Route::get('/location_tour/{id}', [MainController::class, 'tour_list_location'])->name('TourListLocation');
        Route::get('/single_tour/{id}', [MainController::class, 'tour_single'])->name('TourSingle');
    });
    # View Tour Guider
    Route::prefix('/list_guider')->group(function () {
        Route::get('/', [MainController::class, 'list_tour_guider'])->name('list_tour_guider');
        Route::get('/view_guider/{id}',[MainController::class, 'view_guider'])->name('view_guider');
    });
    # search tour
    Route::get(('/search_tour'), [SearchController::class, 'search_tour'])->name('search_tour');
    # search blog
    Route::get(('/search_blog'), [SearchController::class, 'search_blog'])->name('search_blog');
    # search tour = img api
    Route::post(('/search_tour_api'), [SearchController::class, 'search_tour_api'])->name('search_tour_api');
});
# view calender sign of guider
Route::get('/get_sign_guider_data',[MainController::class, 'get_view_sign_guider'])->name('view_sign_guider');
# upload img = ckeditor
Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
});
# upload img
Route::post('/upload', [UploadController::class, 'index']);
# update status book tour
Route::post(('/update_Booktour_Cancel'), [BookManagerController::class, 'update_booktour_cancel'])->name('Up_StatusBookTour_Cancel');
# update status book guider
Route::post(('/update_book_guider'), [BookManagerController::class, 'update_book_guider'])->name('update_book_guider');
