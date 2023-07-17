<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReviewTour;
class Profile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='users';
    protected $fillable=[
        'name',
        'email',
        'username',
        'phone',    
        'password',
        'role',
        'address',
        'avatar',
        'birthday',
        'sex'

    ];
    /**
* The attributes that should be mutated to dates.
*
* @var array
*/
protected $casts = [ 'birthday'=>'datetime'];

public function reviews()
{
    return $this->hasMany(ReviewTour::class, 'customer_id_rv');
}
}
