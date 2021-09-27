<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Blogs extends Model
{
    use HasFactory, Notifiable, HasRoles;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'blog_id');
    }

    public function tags() {
        return $this->hasMany(Tags::class, 'blog_id');
    }
}
