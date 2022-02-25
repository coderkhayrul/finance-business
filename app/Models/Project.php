<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function proCategory()
    {
        return $this->belongsTo(ProjectCategory::class, 'procate_id', 'procate_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'project_cate', 'id');
    }
}
