<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\AddBlog;
class AddCategoryBlog extends Model
{
    use HasFactory;
    protected $table = 'category_blog';
    protected $fillable = [
        'dm_blog_name',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = ['' => 'datetime'];
    public function blog()
    {
        return $this->hasMany(AddBlog::class, 'category_id');
    }
}
