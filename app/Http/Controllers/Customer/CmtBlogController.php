<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentBlog;
use Illuminate\Support\Carbon;

class CmtBlogController extends Controller
{
    public function post_comment_blog(Request $request){
        // $data= $request->all();
        $binhluan = new CommentBlog();
        $binhluan->customer_id_cmt = $request->input('customer_id_cmt');
        $binhluan->blog_single_id = $request->input('blog_single_id');;
        $binhluan->content_cmt = $request->input('content');;
        $binhluan->save();
        $dt = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully.',
            'ngay' => $dt
        ]);
    }
}
