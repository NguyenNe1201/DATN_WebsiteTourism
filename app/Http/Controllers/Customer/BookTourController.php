<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\AddTour;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Http\Services\BookTourService;
use App\Http\Requests\PayMent\SignUpTourRequest;
use App\Models\BookTour;
use App\Models\PayMentTour;
use App\Utilities\VNPay;
use Faker\Provider\ar_EG\Payment;
use App\Utilities\config_vnpay;
use Illuminate\Support\Carbon;
use App\Models\Admin\Profile;

class BookTourController extends Controller
{
    protected $BookTourServices;
    public function __construct(BookTourService $BookTourServices)
    {
        $this->BookTourServices = $BookTourServices;
    }
    public function get_book_tour($tour_id = 0)
    {
        // $regis_people_count = BookTour::where('tour_id', $tour_id)->sum('Regis_number');
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Sign Up Tour';
        $title_content = 'Sign Up Tour';
        $gettour_payment = AddTour::with('cate_location')->where('id', '=', $tour_id)->first();
        return view('users.main_user.BookTour.BookTourCus', compact('gettour_payment', 'categoryblog', 'categorytour', 'title_h2', 'title_content'), ['title' => 'Sign Up Tour']);
    }
    public function post_signuptour(SignUpTourRequest $request)
    {
        $id_customer = (int)$request->input('customer_id');
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
        $total_price = (int)$request->input('total_price');
        //  $code_order = $result['bookTour']->id;
        //  $payment_signup_tour_amount = $result['bookTour']->total_price;
        $code_order = rand(00, 99999);
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        if ($request->input('payment_method') == 0) {
            $result = $this->BookTourServices->create_Signup_tour($request);
            $id_customer = (int)$request->input('customer_id');
            return redirect()->route('GetpPaymentPush')->with(['title_payment' => 'đặt tour thành công!!!']);
        } elseif ($request->input('payment_method') == 1) {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/home/payment_push";
            $vnp_TmnCode = "BYIQ4LU1"; //Mã website tại VNPAY 
            $vnp_HashSecret = "IPLXPAMTSFMMNPHBEHKLDRKBEINIBKKG"; //Chuỗi bí mật
            $vnp_TxnRef = $code_order; 
            $vnp_OrderInfo = 'Thanh toán tour du lịch';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount =   $total_price * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
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
                    'code_order' => $code_order,
                    'customer_id' => (int)$request->input('customer_id'),
                    'payment_date' => (string)$request->input('Regis_date'),
                    'payment_method' => (int)$request->input('payment_method'),
                    'payment_amount' => (int)$request->input('total_price'),
                    'status_payment' => 1,
                ]);
                Profile::where('id', $id_customer)->update([
                    'name' => (string)$request->input('name'),
                    'phone' => (string)$request->input('phone'),
                    'address' => (string)$request->input('address')
                ]);
                header('Location: ' . $vnp_Url);
                die();
                
            } else {
                echo json_encode($returnData);
            }
        }
    }
    public function get_payment_push(Request $request)
    {
        $title_payment = $request->session()->get('title_payment');
        $categorytour = DB::table('category_tour')->get();
        $categoryblog = DB::table('category_blog')->get();
        $title_h2 = 'Payment Success';
        $title_content = 'Payment Success';
        return view('users.main_user.BookTour.payment_success', compact('categoryblog', 'categorytour', 'title_h2', 'title_content', 'title_payment'), ['title' => 'Payment Success']);
    }
}
