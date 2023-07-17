<?php

namespace App\Models;

use App\Models\Admin\TourGuider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteGuider extends Model
{
    use HasFactory;
    protected $table = 'favorite_guider';
    protected $fillable = [
        'customer_id',
        'guider_id',
        
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function customer()
    {
        return $this->belongsTo(Profile::class, 'customer_id');
    }
    public function guider()
    {
        return $this->belongsTo(TourGuider::class, 'guider_id');
    }
}
