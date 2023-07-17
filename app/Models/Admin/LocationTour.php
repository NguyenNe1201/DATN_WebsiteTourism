<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AddTour;
use App\Models\BookTour;

class LocationTour extends Model
{
    use HasFactory;
    protected $table = 'location_tour';
    protected $fillable = [
        'location_name',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function location_tour()
    {
        return $this->hasMany(AddTour::class, 'location_tour_id');
    }
    public function location_t()
    {
        return $this->hasMany(BookTour::class, 'location_tour_id');
    }
    public function bookTours()
    {
        return $this->hasMany(BookTour::class, 'location_tour_id');
    }

}
