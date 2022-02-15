<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Get User
    public function user()
    {
        return $this->belongsTo(User::class, 'gallery_creator', 'id');
    }
    // Get Gallery Category
    public function galcategory()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id', 'galcate_id');
    }
}
