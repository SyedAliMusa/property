<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Comments extends Model
{
    use HasFactory, Notifiable, HasRoles;

    public function blogs() {
        return $this->belongsTo(Blogs::class);
    }
}
