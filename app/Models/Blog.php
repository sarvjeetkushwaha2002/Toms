<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function images()
    {
        return $this->MorphMany(BlogMedia::class, 'imageable');
    }
    public function blogcategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function blogsubcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
