<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMentTour extends Model
{
    use HasFactory;
    protected $table = 'payment_tour';
    protected $fillable = [
        'signup_tour_id',
        'code_order',
        'signup_guider_id',
        'customer_id',
        'payment_amount',
        'payment_method',
        'payment_date',
        'status_payment'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['payment_date' => 'datetime'];
}
