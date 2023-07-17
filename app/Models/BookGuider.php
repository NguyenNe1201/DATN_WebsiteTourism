<?php

namespace App\Models;

use App\Models\Admin\TourGuider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Profile;
use App\Models\ReviewGuider;

class BookGuider extends Model
{
    use HasFactory;
    protected $table = 'sign_up_guider';
    protected $fillable = [
        'guider_id',
        'customer_id',
        'regis_date',
        'total_price',
        'total_day',
        'status_bookguider',
        'start_date',
        'end_date',
        'note_guider'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'regis_date' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        // Sự kiện được kích hoạt khi một mô hình BookGuider được cập nhật
        static::updating(function ($bookGuider) {
            // Kiểm tra nếu trường 'status' đã thay đổi
            if ($bookGuider->isDirty('status_bookguider')) {
                $originalStatus = $bookGuider->getOriginal('status_bookguider');
                $newStatus = $bookGuider->status_bookguider;
                // Kiểm tra điều kiện để cập nhật trạng thái
                if ($originalStatus == 2 && $newStatus == 3) {
                    $bookGuider->status_bookguider = 3;
                }
            }
            // Kiểm tra điều kiện để cập nhật trạng thái dựa trên 'end_date'
            if ($bookGuider->isDirty('end_date') && $bookGuider->end_date <= now()) {
                if ($bookGuider->status_bookguider == 2) {
                    $bookGuider->status_bookguider = 3;
                }
            }
        });
        // Sự kiện được kích hoạt khi một mô hình BookGuider được truy vấn từ cơ sở dữ liệu
        static::retrieved(function ($bookGuider) {
            if ($bookGuider->end_date <= now()) {
                if ($bookGuider->status_bookguider == 2) {
                    $bookGuider->status_bookguider = 3;
                    $bookGuider->save();
                }
            }
        });
    }
    public function guider()
    {
        return $this->belongsTo(TourGuider::class, 'guider_id');
    }
    public function customer()
    {
        return $this->belongsTo(Profile::class,'customer_id');
    }
    public function payment()
    {
        return $this->hasOne(PayMentTour::class, 'signup_guider_id');
    }
    public function reviews_guider()
    {
        return $this->hasOne(ReviewGuider::class, 'signup_guider_id');
    }
}
