<?php

namespace App\Http\Services;

use App\Http\Requests\AddBlog\EditCateBlogRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Profile;
use App\Models\Admin\AddBlog;
use GuzzleHttp\Psr7\Request;
use Ramsey\Uuid\Type\Integer;

class ProfileService
{
 // Edit category blog
 public function update_profile($request)
 {
    $id = (int)$request->input('edit_profile');
    $request->validate([
      'email' => 'required|email:filter|unique:users,email,' . $id,
    ], [
      'email.unique' => 'Email này đã tồn tại. Vui lòng nhập Email khác!'
    ]);
    if ($id == 0) {
       FacadesSession::flash('error', 'Chọn người để cập nhật!');
    } else {
       try {
          Profile::where('id',$id)->update([
            'name' => (string)$request->input('name'),
            'avatar' => (string)$request->input('file_profile'),
            'phone' => (string)$request->input('phone'),
            'email' => (string)$request->input('email'),
            'username' => (string)$request->input('username'),
            'address' => (string)$request->input('address'),
            // 'password' => (string)bcrypt($request->input('password')),
            'sex' => (int)$request->input('sex'),
            'birthday' => (string)$request->input('birthday'),
          ]);
          FacadesSession::flash('success', 'Cập nhật thành công!');
       } catch (\Exception $err) {
          FacadesSession::flash('error', 'Cập nhật thất bại!');
          return false;
       }
       return true;
    }
 }
  // add costomer
  public function create_account_customer($request)
  {
      try {
          Profile::create([
               'name' => (string)$request->input('name'),
               'avatar' => (string)$request->input('file_profile'),
               'phone' => (string)$request->input('phone'),
               'email' => (string)$request->input('email'),
               'username' => (string)$request->input('username'),
               'address' => (string)$request->input('address'),
               'password' => (string)bcrypt($request->input('password')),
               'role' => (int)$request->input('role'),
               'sex' => (int)$request->input('sex'),
               'birthday' => (string)$request->input('birthday')
          ]);
          FacadesSession::flash('success', 'Tạo tài khoản thành công!');
      } catch (\Exception $err) {
          FacadesSession::flash('error', $err->getMessage());
          return false;
      }
      return true;
  }
}