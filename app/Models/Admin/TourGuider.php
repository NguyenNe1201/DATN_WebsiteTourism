<?php

namespace App\Models\Admin;

use App\Models\ReviewGuider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuider extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tour_guider';
    protected $fillable = [
        'name_guider',
        'email_guider',
        'phone_guider',
        'address_guider',
        'avatar_guider',
        'status_guider',
        'price_1date',
        'language_guider',
        'birthday_guider',
        'sex_guider',
        'describe_guider',
        'role'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['birthday_guider' => 'datetime'];
    public function reviews()
    {
        return $this->hasMany(ReviewGuider::class, 'guider_id');
    }
}
