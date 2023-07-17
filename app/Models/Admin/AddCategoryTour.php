<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AddTour;
class AddCategoryTour extends Model
{
    use HasFactory;
    protected $table = 'category_tour';
    protected $fillable = [
        'cate_tour_name',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function tour()
    {
        return $this->hasMany(AddTour::class, 'cate_tour_id');
    }
}
