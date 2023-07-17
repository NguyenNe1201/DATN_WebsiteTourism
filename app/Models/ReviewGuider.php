<?php

namespace App\Models;

use App\Models\Admin\TourGuider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Profile;
class ReviewGuider extends Model
{
    use HasFactory;
    protected $table = 'review_guider';
    protected $fillable = [
        'guider_id',
        'customer_id_rv',
        'rating_guider',
        'content_review',
        'review_date',
        'signup_guider_id'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['review_date' => 'datetime'];
    public function guider()
    {
        return $this->belongsTo(TourGuider::class, 'guider_id');
    }
    public function customer()
    {
        return $this->belongsTo(Profile::class,'customer_id_rv');
    }
}
