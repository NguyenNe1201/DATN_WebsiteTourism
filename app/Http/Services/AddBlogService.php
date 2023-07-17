<?php

namespace App\Http\Services;

use App\Http\Requests\AddBlog\EditCateBlogRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AddCategoryBlog;
use App\Models\Admin\AddBlog;
use GuzzleHttp\Psr7\Request;
use Ramsey\Uuid\Type\Integer;

class AddBlogService
{
   //================================ Add Category Blog /  Updata Category Blog  ==================================
   public function create_category_blog($request)
   {
      try {
         AddCategoryBlog::create([

            'dm_blog_name' => (string)$request->input('dm_blog_name'),
         ]);
         FacadesSession::flash('success', 'Thêm danh mục blog thành công!');
      } catch (\Exception $err) {
         FacadesSession::flash('error', $err->getMessage());
         return false;
      }
      return true;
   }
   // Edit category blog
   public function update_category_blog($request)
   {
      $id = (int)$request->input('dm_blog_get');
      if ($id == 0) {
         FacadesSession::flash('error', 'Chọn danh mục để cập nhật!');
      } else {
         try {
            AddCategoryBlog::where('id', $id)->update([
               'dm_blog_name' => (string)$request->input('updm_blog_name'),
            ]);
            FacadesSession::flash('success', 'Cập nhật thành công!');
         } catch (\Exception $err) {
            FacadesSession::flash('error', 'Cập nhật thất bại!');
            return false;
         }
         return true;
      }
   }
   //-------------------------------- ADD - EDIT - DELETE content main blog single ---------------------------------
   // add blog
   public function create_blog($request)
   {
      try {
         AddBlog::create([
            'category_id' => (int)$request->input('category_id'),
            'user_id' => (int)$request->input('admin_id'),
            'title' => (string)$request->input('title'),
            'img_title' => (string)$request->input('file'),
            'content' => (string)$request->input('content_blog'),
            'status_blog' => (int)$request->input('status_blog'),
         ]);
         FacadesSession::flash('success', 'Thêm bài viết blog thành công!');
      } catch (\Exception $err) {
         FacadesSession::flash('error', $err->getMessage());
         return false;
      }
      return true;
   }
   //edit content main blog single
   public function getDetailEditBlog($id)
   {
      return  DB::table('blog')->where('id', $id)->get();
   }
   public function update_blog($request, $id)
   {
      try {
         AddBlog::where('id', $id)->update([
            'category_id' => (int)$request->input('category_id'),
            'title' => (string)$request->input('title'),
            'img_title' => (string)$request->input('upfile'),
            'content' => (string)$request->input('content_blog'),


         ]);
         FacadesSession::flash('success', 'Edit bài viết blog thành công!');
      } catch (\Exception $err) {
         FacadesSession::flash('error', $err->getMessage());
         return false;
      }
      return true;
   }
   //-------------------------------- END status Blog ---------------------------------
   public function update_blog_status($request)
   {
      $id = (int)$request->input('id_blog');
      try {
         AddBlog::where('id', $id)->update([
            'status_blog' => (int)$request->input('status_blog_edit'),

         ]);
         FacadesSession::flash('success', 'Cập nhật trạng thái thành công!');
      } catch (\Exception $err) {
         FacadesSession::flash('error', $err->getMessage());
         return false;
      }
      return true;
   }
}
