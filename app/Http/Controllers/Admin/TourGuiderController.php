<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TourGuider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourGuiderController extends Controller
{
    // view add tour guider
    public function get_add_tour_guider()
    {
        return view('admin.main_adm.TourGuider_adm.AddTourGuider', ['title' => 'Add Tour Guider']);
    }
    // view list tour guider
    public function get_list_guider()
    {
        $list = TourGuider::orderby('created_at', 'DESC')->get();
        return view('admin.main_adm.TourGuider_adm.ListTourGuider', compact('list'), ['title' => 'Add Tour Guider']);
    }
    // delete tour guider
    public function get_delete_guider($id)
    {
        $data = []; // khởi tạo mảng data chứa $error và $success
        if (!empty($id)) {
            $dete = TourGuider::where('id', $id)->get();
            if (!empty($dete[0])) {
                $deleteStatus = DB::table('tour_guider')->where('id', $id)->delete();
                if ($deleteStatus) {
                    $data['success'] = 'Xóa Tour Guider thành công!';
                } else {
                    $data['error'] = 'Bạn không thể xóa. Vui lòng thử lại!';
                }
            } else {
                $data['error'] = 'Tour Guider không tồn tại!';
            }
        } else {
            $data['error'] = 'Link này không tồn tại!';
        }
        return redirect()->back()->with($data);
    }
    //add tour guider
    public function post_tour_guider(Request $request)
    {
        $request->validate([
            'email_guider' => 'required|email:filter|unique:tour_guider',
            'name_guider' => 'required',
            'phone_guider' => 'required',
            'address_guider' => 'required',
            'file_profile' => 'required',
            'status_guider' => 'required',
            'sex_guider' => 'required',
            'birthday_guider' => 'required',
            'describe_guider' => 'required',
            'price_1date' => 'required',
            'language_guider' => 'required',
        ], []);
        TourGuider::create([
            'name_guider' => (string)$request->input('name_guider'),
            'email_guider' => (string)$request->input('email_guider'),
            'phone_guider' => (string)$request->input('phone_guider'),
            'address_guider' => (string)$request->input('address_guider'),
            'avatar_guider' => (string)$request->input('file_profile'),
            'status_guider' => (int)$request->input('status_guider'),
            'sex_guider' => (int)$request->input('sex_guider'),
            'birthday_guider' => (string)$request->input('birthday_guider'),
            'describe_guider' => (string)$request->input('describe_guider'),
            'price_1date' => (int)$request->input('price_1date'),
            'language_guider' => (string)$request->input('language_guider'),
            'role' => (int)$request->input('role'),
        ]);
        $success = 'Thêm tour guider thành công!';
        return redirect()->route('get_list_guider')->with('success', $success);
    }
    //edit profile guider
    public function getedit_guider(Request $request, $id = 0)
    {
        if (!empty($id)) {
            $editGuider = DB::table('tour_guider')->where('id', $id)->get();
            if (!empty($editGuider[0])) {
                $request->session()->put('id', $id);
                $editGuider = $editGuider[0];
            } else {
                return redirect()->route('get_list_guider')->with('error', 'Blog không tồn tại!');
            }
        } else {
            return redirect()->route('get_list_guider')->with('error', 'Liên kết không tồn tại!');
        }
        return view('admin.main_adm.TourGuider_adm.EditTourGuider', compact('editGuider'), ['title' => 'Edit Tour Guider']);
    }
    public function postedit_guider(Request $request)
    {
        $id = (int) $request->input('id_tourguider');
        $email = $request->input('email_guider');

        // Kiểm tra sự tồn tại của giá trị email_guider trong bản ghi khác
        $existingGuider = TourGuider::where('email_guider', $email)->where('id', '!=', $id)->first();
        if ($existingGuider) {
            // Giá trị email_guider đã tồn tại trong bản ghi khác
            return back()->withErrors(['email_guider' => 'Email Đã Tồn Tại.']);
        }
        $request->validate([
            'email_guider' => 'required|email:filter',
            'name_guider' => 'required',
            'phone_guider' => 'required',
            'address_guider' => 'required',
            'file_profile' => 'required',
            'status_guider' => 'required',
            'sex_guider' => 'required',
            'birthday_guider' => 'required',
            'describe_guider' => 'required',
            'price_1date' => 'required',
            'language_guider' => 'required',
        ]);

        TourGuider::where('id', $id)->update([
            'name_guider' => (string) $request->input('name_guider'),
            'email_guider' => (string) $request->input('email_guider'),
            'phone_guider' => (string) $request->input('phone_guider'),
            'address_guider' => (string) $request->input('address_guider'),
            'avatar_guider' => (string) $request->input('file_profile'),
            'status_guider' => (int) $request->input('status_guider'),
            'sex_guider' => (int) $request->input('sex_guider'),
            'birthday_guider' => (string) $request->input('birthday_guider'),
            'describe_guider' => (string) $request->input('describe_guider'),
            'price_1date' => (int) $request->input('price_1date'),
            'role' => (int)$request->input('role'),
            'language_guider' => (string) $request->input('language_guider')
        ]);

        $success = 'Cập nhật Tour Guider thành công!';
        return redirect()->route('get_list_guider')->with('success', $success);
    }
    // update status guider onl/off
    public function update_status_guider(Request $request){
        $id = (int) $request->input('id_guider');
        TourGuider::where('id', $id)->update([
            'status_guider' => (int) $request->input('status_edit'),
            
        ]);
        $success = 'Cập nhật trạng thái thành công!';
        return redirect()->back()->with('success', $success);
    }
}
