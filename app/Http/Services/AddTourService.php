<?php

namespace App\Http\Services;

use App\Http\Requests\AddBlog\EditCateBlogRequest;
use App\Models\Admin\AddCategoryTour;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AddTour;
use App\Models\Admin\AddGalleryTour;
use GuzzleHttp\Psr7\Request;
use Ramsey\Uuid\Type\Integer;
use App\Models\Admin\TourGuider;
class AddTourService
{
    // ================================ CATEGORY  TOUR ==========================
    // Add Category Tour
    public function create_category_tour($request)
    {
        try {
            AddCategoryTour::create([
                'cate_tour_name' => (string)$request->input('cate_tour_name'),
            ]);
            FacadesSession::flash('success', 'Thêm danh mục thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // Edit category blog
    public function update_category_blog($request)
    {
        $id = (int)$request->input('cate_tour_get');
        if ($id == 0) {
            FacadesSession::flash('error', 'Chọn danh mục để cập nhật!');
        } else {
            try {
                AddCategoryTour::where('id', $id)->update([
                    'cate_tour_name' => (string)$request->input('upcate_tour_name'),
                ]);
                FacadesSession::flash('success', 'Cập nhật thành công!');
            } catch (\Exception $err) {
                FacadesSession::flash('error', 'Cập nhật thất bại!');
                return false;
            }
            return true;
        }
    }
    // ++++++++++++++++++++++++++++++++ TOUR ++++++++++++++++++++++++++++++++++++
    // add tour
    public function create_tour($request)
    {
        // $id_guider = (int)$request->input('guider_id');
        try {
            AddTour::create([
                'cate_tour_id' =>(int)$request->input('cate_tour_id'),
                'tourname' => (string)$request->input('tourname'),
                'location_tour_id' => (int)$request->input('location_t'),
                'location_url' => (string)$request->input('location_url'),
                'img_lgtour' => (string)$request->input('filetour'),
                'introduce_t' => (string)$request->input('introduce_t'),
                'describe_t' => (string)$request->input('describe_t'),
                'tourplan' => (string)$request->input('tourplan'),
                'tour_date' => (int)$request->input('tour_date'),
                'price' => (string)$request->input('price'),
                // 'guider_id' => (int)$request->input('guider_id'),
            ]);
            // TourGuider::where('id', $id_guider)->update([
            //     'status_guider' => 0,
            // ]);
            FacadesSession::flash('success', 'Thêm tour thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // Edit Tour
    public function update_tour($request, $id)
    {
        // $id_guider = (int)$request->input('guider_id');
        try {
            AddTour::where('id', $id)->update([
                'cate_tour_id' => (int)$request->input('cate_tour_id'),
                'tourname' => (string)$request->input('tourname'),
                'location_tour_id' => (int)$request->input('location_t'),
                'location_url' => (string)$request->input('location_url'),
                'img_lgtour' => (string)$request->input('upfiletour'),
                'introduce_t' => (string)$request->input('introduce_t'),
                'describe_t' => (string)$request->input('describe_t'),
                'tourplan' => (string)$request->input('tourplan'),
                'tour_date' => (int)$request->input('tour_date'),
                'price' => (string)$request->input('price'),
                // 'guider_id' => (int)$request->input('guider_id'),
            ]);
            // TourGuider::where('id', $id_guider)->update([
            //     'status_guider' => 0,
            // ]);
            FacadesSession::flash('success', 'Edit Tour thành công!');
        } catch (\Exception $err) {
            FacadesSession::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
}
