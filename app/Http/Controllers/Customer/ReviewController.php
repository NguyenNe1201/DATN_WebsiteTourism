<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ReviewGuider;
use Illuminate\Http\Request;
use App\Models\ReviewTour;
use App\Events\UserRatedTour;
use App\Models\Admin\AddTour;
class ReviewController extends Controller
{
    public function post_review_tour(Request $request){
        // Lấy giá trị từ request
        $rating_tour = (int) $request->input('rate');
        $content_review = $request->input('content_review');
        $review_date = $request->input('review_date');
        $tourId = (int) $request->input('tour_id');
        $userIdA = (int) $request->input('customer_id_rv');
        $sign_up_id = (int) $request->input('sign_up_id');
        // Tạo mới đối tượng ReviewTour
        $review = new ReviewTour();
        $review->rating_tour= $rating_tour;
        $review->content_review = $content_review;
        $review->tour_id = $tourId;
        $review->sign_up_id = $sign_up_id;
        $review->review_date = $review_date;
        $review->customer_id_rv =$userIdA;
        $review->save();
        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi đi thành công.');

    }
    public function  post_review_guider(Request $request){
         // Lấy giá trị từ request
         $rating_guider = (int) $request->input('rate');
         $content_review = $request->input('content_review');
         $review_date = $request->input('review_date');
         $guider_id = (int) $request->input('guider_id');
         $customer_id_rv = (int) $request->input('customer_id_rv');
         $signup_guider_id = (int) $request->input('signup_guider_id');
         // Tạo mới đối tượng ReviewTour
         $review = new ReviewGuider();
         $review->rating_guider= $rating_guider;
         $review->content_review = $content_review;
         $review->guider_id = $guider_id;
         $review->signup_guider_id = $signup_guider_id;
         $review->review_date = $review_date;
         $review->customer_id_rv = $customer_id_rv;
         // Lưu đánh giá vào cơ sở dữ liệu
         $review->save();
         return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi đi thành công.');
    }
}
