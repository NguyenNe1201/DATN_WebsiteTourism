<?php

namespace App\Models;

use App\Models\Admin\AddBlog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Profile;
class FavoriteBlog extends Model
{
    use HasFactory;
    protected $table = 'favorite_blog';
    protected $fillable = [
        'customer_id',
        'blog_id',
        
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
    public function blog()
    {
        return $this->belongsTo(AddBlog::class, 'blog_id');
    }
}
