<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime; // Import class DateTime
use Carbon\Carbon; // Import class Carbon
use App\Models\BookTour;
use App\Models\Admin\AddCategoryTour;
use App\Models\Admin\AddGalleryTour;
use App\Models\ReviewTour;
use App\Models\Admin\LocationTour;
use Laravel\Scout\Searchable;
use App\Models\Admin\TourGuider;
class AddTour extends Model
{
    use HasFactory, Searchable;
    protected $table = 'tour';
    protected $fillable = [
        'cate_tour_id',
        'tourname',
        'location_tour_id',
        'location_url',
        'img_lgtour',
        'introduce_t',
        'describe_t',
        'tourplan',
        'tour_date',
        'price',
        // 'guider_id'
    ];
    public function toSearchableArray()
    {
        return [
            'tourname' => $this->tourname,
            // 'location_t' => $this->location_t,
        ];
    }   
    protected $casts = [
        '' => 'datetime',
    ];
    // public function guider()
    // {
    //     return $this->hasMany(TourGuider::class,'id');
    // }
    public function cate_tour()
    {
        return $this->belongsTo(AddCategoryTour::class, 'cate_tour_id');
    }
    public function cate_location()
    {
        return $this->belongsTo(LocationTour::class, 'location_tour_id');
    }
    public function sign_tour()
    {
        return $this->hasMany(BookTour::class, 'tour_id', 'id');
    }
    public function gallery_tour()
    {
        return $this->hasMany(AddGalleryTour::class, 'tour_id');
    }
    public function reviews()
    {
        return $this->hasMany(ReviewTour::class, 'tour_id');
    }
}
