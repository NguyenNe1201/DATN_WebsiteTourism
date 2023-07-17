<?php

namespace App\Models;

use App\Models\Admin\AddTour;
use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTour extends Model
{
    use HasFactory;
    protected $table = 'favorite_tour';
    protected $fillable = [
        'customer_id',
        'tour_id',
        
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
    public function tour()
    {
        return $this->belongsTo(AddTour::class, 'tour_id');
    }
}
