<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Profile;
class CommentBlog extends Model
{
    use HasFactory;
    protected $table = 'comment_blog';
    protected $fillable = [
        'customer_id_cmt',
        'blog_single_id',
        'content_cmt'
      
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function customer()
    {
        return $this->belongsTo(Profile::class,'customer_id_cmt');
    }
    public function blog()
    {
        return $this->belongsTo(AddBlog::class, 'blog_single_id');
    }
}
