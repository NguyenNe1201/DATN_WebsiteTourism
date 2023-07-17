<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AddCategoryBlog;
use App\Models\CommentBlog;
use App\Models\Admin\Profile;
class AddBlog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'category_id',
        'title',
        'img_title',
        'content',
        'user_id',
        'status_blog'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function cate_blog()
    {
        return $this->belongsTo(AddCategoryBlog::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(CommentBlog::class, 'blog_single_id');
    }
    public function user()
    {
        return $this->belongsTo(Profile::class,'user_id');
    }
}
