<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AddTour;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Models\BookTour;
use App\Models\PayMentTour;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookTourService;
use App\Models\Admin\TourGuider;
use App\Models\BookGuider;

class BookManagerController extends Controller
{
    protected $BookTourServices;
    public function __construct(BookTourService $BookTourServices)
    {
        $this->BookTourServices = $BookTourServices;
    }
    // add id guider in sign tour
    public function get_id_guider($sign_tour_id)
    {
        $booktour = BookTour::with('tour', 'customer', 'payment', 'tour_location', 'guider_tour')->where('id', $sign_tour_id)->first();
        $guider = TourGuider::where('role', 0)->get();
        return view('admin.main_adm.Booking_adm.AddGuiderInSignTour', compact('booktour', 'guider'), ['title' => 'Add Guider in Sign Tour']);
    }
    public function post_id_guider(Request $request)
    {
        $id_sign_up = (int)$request->input('sign_tour_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $guider_id = (int)$request->input('guider_id');
        // Kiểm tra xem có BookTour khác nào có cùng guider_id và trùng thời gian không
        $existingTour = BookTour::where('guider_id', $guider_id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date]);
            })->where('id', '<>', $id_sign_up)->exists(); // Loại trừ BookTour hiện tại
        // nếu guider đã tồn tại lịch book thì thông báo lỗi
        if ($existingTour) {
            return redirect()->back()->with('error', 'Hướng dẫn viên đã đặt tour khác trong thời gian này!');
        }
        BookTour::where('id', $id_sign_up)->update([
            'guider_id' => (int)$request->input('guider_id'),
        ]);
        return redirect()->route('ListBookTourManager')->with('success', 'Cập nhật hướng dẫn viên thành công!');
    }
    // ============================ View List Book Tour Manager ==============================
    public function list_book_tour_manager()
    {

        $getsigntour = BookTour::with('tour', 'customer', 'payment', 'tour_location', 'guider_tour')->orderby('created_at', 'DESC')->get();
        return view('admin.main_adm.Booking_adm.BookTourManager', compact('getsigntour'), ['title' => 'List Tour Booking']);
    }
    public function delete_book_tour($booktour_id)
    {
        $data = []; // Khởi tạo mảng data chứa $error và $success
        if (!empty($booktour_id)) {
            $booktour = BookTour::find($booktour_id);
            if ($booktour) {
                $getpayment_tour = PayMentTour::where('signup_tour_id', $booktour_id)->first();
                if ($getpayment_tour) {
                    $deleteStatus = $booktour->delete();
                    $deletePayment_tour = $getpayment_tour->delete();
                    if ($deleteStatus && $deletePayment_tour) {
                        $data['success'] = 'Xóa tour booking thành công!';
                    } else {
                        $data['error'] = 'Bạn không thể xóa. Vui lòng thử lại!';
                    }
                } else {
                    $data['error'] = 'Tour booking không tồn tại!';
                }
            } else {
                $data['error'] = 'Tour booking không tồn tại!';
            }
        } else {
            $data['error'] = 'Link này không tồn tại!';
        }
        return redirect()->back()->with($data);
    }
    public function update_booktour_cancel(Request $request)
    {
        $result = $this->BookTourServices->update_Status_Signup_tour($request);
        return redirect()->back();
    }
    public function update_status_payment(Request $request)
    {
        $result = $this->BookTourServices->update_Status_payment_tour($request);
        return redirect()->back();
    }
    // 
    public function list_book_guider_manager()
    {
        $getsignguider = BookGuider::with('guider', 'customer', 'payment')->orderby('created_at', 'DESC')->get();
        return view('admin.main_adm.Booking_adm.BookGuiderManager', compact('getsignguider'), ['title' => 'List Guider Booking']);
    }
    public function update_Book_guider(Request $request)
    {
        $result = $this->BookTourServices->update_Status_Signup_guider($request);
        return redirect()->back();
    }
    // delete book guider
    public function delete_book_guider($bookguider_id)
    {
        $data = []; // Khởi tạo mảng data chứa $error và $success
        if (!empty($bookguider_id)) {
            $bookguider = BookGuider::find($bookguider_id);
            if ($bookguider) {
                $getpayment_tour = PayMentTour::where('signup_guider_id', $bookguider_id)->first();
                if ($getpayment_tour) {
                    $deleteStatus = $bookguider->delete();
                    $deletePayment_tour = $getpayment_tour->delete();
                    if ($deleteStatus && $deletePayment_tour) {
                        $data['success'] = 'Xóa guider booking thành công!';
                    } else {
                        $data['error'] = 'Bạn không thể xóa. Vui lòng thử lại!';
                    }
                } else {
                    $data['error'] = 'Tour booking không tồn tại!';
                }
            } else {
                $data['error'] = 'Tour booking không tồn tại!';
            }
        } else {
            $data['error'] = 'Link này không tồn tại!';
        }
        return redirect()->back()->with($data);
    }
}
