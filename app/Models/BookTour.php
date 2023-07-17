<?php

namespace App\Models;

use App\Models\Admin\AddTour;
use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PayMentTour;
use App\Models\ReviewTour;
use App\Models\Admin\LocationTour;
use App\Models\Admin\TourGuider;
class BookTour extends Model
{
    use HasFactory;
    protected $table = 'sign_up_tour';
    protected $fillable = [
        'tour_id',
        'customer_id',
        'Regis_date',
        'Regis_number',
        'total_price',
        'status',
        'start_date',
        'end_date',
        'note_tour',
        'location_tour_id',
        'guider_id'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'Regis_date' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();
        // Sự kiện được kích hoạt khi một mô hình BookTour được cập nhật
        static::updating(function ($bookTour) {
            // Kiểm tra nếu trường 'status' đã thay đổi
            if ($bookTour->isDirty('status')) {
                $originalStatus = $bookTour->getOriginal('status');
                $newStatus = $bookTour->status;
                // Kiểm tra điều kiện để cập nhật trạng thái
                if ($originalStatus == 2 && $newStatus == 3) {
                    $bookTour->status = 3;
                }
            }
            // Kiểm tra điều kiện để cập nhật trạng thái dựa trên 'end_date'
            if ($bookTour->isDirty('end_date') && $bookTour->end_date <= now()) {
                if ($bookTour->status == 2) {
                    $bookTour->status = 3;
                }
            }
        });
        // Sự kiện được kích hoạt khi một mô hình BookTour được truy vấn từ cơ sở dữ liệu
        static::retrieved(function ($bookTour) {
            if ($bookTour->end_date <= now()) {
                if ($bookTour->status == 2) {
                    $bookTour->status = 3;
                    $bookTour->save();
                }
            }
        });
    }
    public function tour_location()
    {
        return $this->belongsTo(LocationTour::class, 'location_tour_id');
    }
    public function tour()
    {
        return $this->belongsTo(AddTour::class);
    }
    public function customer()
    {
        return $this->belongsTo(Profile::class);
    }
    public function payment()
    {
        return $this->hasOne(PayMentTour::class, 'signup_tour_id');
    }
    public function reviews()
    {
        return $this->hasOne(ReviewTour::class, 'sign_up_id');
    }
    public function guider_tour()
    {
        return $this->belongsTo(TourGuider::class, 'guider_id');
    }
}
