<?php

namespace App\Http\Services;

use App\Http\Requests\AddBlog\EditCateBlogRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Profile;
use App\Models\Admin\AddBlog;
use App\Models\BookGuider;
use GuzzleHttp\Psr7\Request;
use Ramsey\Uuid\Type\Integer;
use App\Models\BookTour;
use App\Models\PayMentTour;

class BookTourService
{
    // add Sign Up Tour
    public function create_Signup_tour($request)
    {
        $id_customer = (int)$request->input('customer_id');
        $code_order = rand(00, 99999);
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
        try {

            $bookTour =  BookTour::create([
                'tour_id' => (int)$request->input('tour_id'),
                'customer_id' => (int)$request->input('customer_id'),
                'Regis_date' => (string)$request->input('Regis_date'),
                'start_date' => (string)$request->input('start_date'),
                'end_date' => $end_date,
                'Regis_number' => (int)$request->input('num_people'),
                'total_price' => (int)$request->input('total_price'),
                'status' => 1,
                'note_tour' => (string)$request->input('note_tour'),
                'location_tour_id' => (int)$request->input('location_tour_id'),
            ]);
            $paymentTour = PayMentTour::create([
                'signup_tour_id' => $bookTour->id,
                'code_order' =>  $code_order,
                'customer_id' => (int)$request->input('customer_id'),
                'payment_method' => (int)$request->input('payment_method'),
                'status_payment' => (int)$request->input('status_payment'),
            ]);
            Profile::where('id', $id_customer)->update([
                'name' => (string)$request->input('name'),
                'phone' => (string)$request->input('phone'),
                'address' => (string)$request->input('address')
            ]);
            FacadesSession::flash('success', 'Đăng kí tour thành công!');
            return ['success' => true, 'bookTour' => $bookTour, 'paymentTour' => $paymentTour];
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // update status sign up tour
    public function update_Status_Signup_tour($request)
    {
        $id = (int)$request->input('id_signtour');
        try {
            BookTour::where('id', $id)->update([
                'status' => (int)$request->input('status_edit'),
            ]);
            FacadesSession::flash('success', 'Cập nhật trạng thái thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // update status payment
    public function update_Status_payment_tour($request)
    {
        $id = (int)$request->input('id_payment_tour');
        try {
            PayMentTour::where('id', $id)->update([
                'status_payment' => (int)$request->input('status_payment_edit'),
                'payment_amount' => (int)$request->input('payment_amount_edit'),
                'payment_date' => (string)$request->input('payment_date'),
            ]);
            FacadesSession::flash('success', 'Cập nhật trạng thái thanh toán thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // update status sign up guider
    public function update_Status_Signup_guider($request)
    {
        $id = (int)$request->input('id_sign_guider');
        try {
            BookGuider::where('id', $id)->update([
                'status_bookguider' => (int)$request->input('status_edit'),
            ]);
            FacadesSession::flash('success', 'Cập nhật trạng thái thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
}
