<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AddTour;
class AddGalleryTour extends Model
{
    use HasFactory;
    protected $table = 'gallery_tour';
    protected $fillable = [
        'tour_id',
        'gallery_img',
        'gallery_name',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function tour_name()
    {
        return $this->belongsTo(AddTour::class, 'tour_id');
    }
   
}
