<?php

namespace App\Models;

use App\Models\Admin\AddTour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Profile;
class ReviewTour extends Model
{
    use HasFactory;
    protected $table = 'review_tour';
    protected $fillable = [
         'tour_id',
        'customer_id_rv',
        'rating_tour',
        'content_review',
        'review_date',
        'sign_up_id'
    ];
    protected $casts = ['review_date' => 'datetime'];
    public function tour()
    {
        return $this->belongsTo(AddTour::class, 'tour_id');
    }
    public function customer()
    {
        return $this->belongsTo(Profile::class,'customer_id_rv');
    }
    
}
