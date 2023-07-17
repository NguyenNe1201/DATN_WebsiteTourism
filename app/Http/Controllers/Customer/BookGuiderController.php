<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\TourGuider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Profile;
use App\Models\BookGuider;
use App\Models\PayMentTour;
use Illuminate\Support\Carbon;

class BookGuiderController extends Controller
{
    public function get_book_guider($guider_id = 0)
    {
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Sign Up Guider';
        $title_content = 'Sign Up Guider';
        $getguider_signup = TourGuider::where('id', '=', $guider_id)->first();
        if ($getguider_signup->status_guider == 1) {
            return view('users.main_user.Guider_user.BookGuider', compact('getguider_signup', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Sign Up Guider']);
        } elseif ($getguider_signup->status_guider == 0) {
            return redirect()->route('get_list_guider')->with(['error' => 'Tour Guider này Offile, không thể book bây giờ!']);
        }
    }
    public function post_signup_guider(Request $request)
    {
        $id_customer = (int)$request->input('customer_id');
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
        $total_price = (int)$request->input('total_price');
        $code_order = rand(00, 99999);
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        // thanh toán tại công ty
        if ($request->input('payment_method') == 0) {
            $bookGuider =  BookGuider::create([
                'guider_id' => (int)$request->input('guider_id'),
                'customer_id' => (int)$request->input('customer_id'),
                'regis_date' => (string)$request->input('regis_date'),
                'start_date' => (string)$request->input('start_date'),
                'end_date' => (string)$request->input('end_date'),
                'total_day' => (int)$request->input('total_day'),
                'total_price' => (int)$request->input('total_price'),
                'status_bookguider' => (int)$request->input('status_bookguider'),
                'note_guider' => (string)$request->input('note_guider')
            ]);
            $paymentGuider = PayMentTour::create([
                'signup_guider_id' =>  $bookGuider->id,
                'code_order' => $code_order,
                'customer_id' => (int)$request->input('customer_id'),
                'payment_method' => (int)$request->input('payment_method'),
                'status_payment' => 0,
            ]);
            Profile::where('id', $id_customer)->update([
                'name' => (string)$request->input('name'),
                'phone' => (string)$request->input('phone'),
                'address' => (string)$request->input('address')
            ]);
            return redirect()->route('GetpPaymentPush')->with(['success' => 'đặt guider thành công!!!']);
        } elseif ($request->input('payment_method') == 1) {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/home/payment_push";
            $vnp_TmnCode = "BYIQ4LU1"; //Mã website tại VNPAY 
            $vnp_HashSecret = "IPLXPAMTSFMMNPHBEHKLDRKBEINIBKKG"; //Chuỗi bí mật
            $vnp_TxnRef =  Carbon::now()->format('Y-m-d H:i:s');;
            $vnp_OrderInfo = 'Thanh toán tour du lịch';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount =   $total_price * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $vnp_ExpireDate = $expire;
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $vnp_ExpireDate

            );
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                $bookGuider =  BookGuider::create([
                    'guider_id' => (int)$request->input('guider_id'),
                    'customer_id' => (int)$request->input('customer_id'),
                    'regis_date' => (string)$request->input('regis_date'),
                    'start_date' => (string)$request->input('start_date'),
                    'end_date' => (string)$request->input('end_date'),
                    'total_day' => (int)$request->input('total_day'),
                    'total_price' => (int)$request->input('total_price'),
                    'status_bookguider' => (int)$request->input('status_bookguider'),
                    'note_guider' => (string)$request->input('note_guider')
                ]);
                $paymentGuider = PayMentTour::create([
                    'signup_guider_id' =>  $bookGuider->id,
                    'code_order' => $code_order,
                    'customer_id' => (int)$request->input('customer_id'),
                    'payment_method' => (int)$request->input('payment_method'),
                    'payment_amount' => (int)$request->input('total_price'),
                    'status_payment' => 1
                ]);
                Profile::where('id', $id_customer)->update([
                    'name' => (string)$request->input('name'),
                    'phone' => (string)$request->input('phone'),
                    'address' => (string)$request->input('address')
                ]);
                die();
            } else {

                echo json_encode($returnData);
            }
        }
    }
    //  check guider plan
    public function get_check_guider_plan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $guiderId = $request->input('guider_id');
        $duplicateSchedule = BookGuider::where('guider_id', $guiderId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where('status_bookguider', '!=', 0)
                    ->where(function ($query) use ($startDate, $endDate) {
                        $query->whereBetween('start_date', [$startDate, $endDate])
                            ->orWhereBetween('end_date', [$startDate, $endDate])
                            ->orWhere(function ($query) use ($startDate, $endDate) {
                                $query->where('start_date', '<=', $startDate)
                                    ->where('end_date', '>=', $endDate);
                            });
                    });
            })->first();
        return response()->json(['duplicate' => $duplicateSchedule !== null]);
    }
}
