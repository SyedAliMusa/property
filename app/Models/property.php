<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'agent_id')
            ->where('is_active', '=', true);
    }

    public function propertyImages() {
        return $this->hasMany(propertyImages::class)
            ->where('is_deleted', '=', false);
    }

    public function propertyFeatures() {
        return $this->hasMany(propertyFeatures::class);
    }

    public static function PropertyFeatured() {
        return property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Featured()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->get();
    }

    public static function Property($val) {
        return property::with(['user', 'propertyImages', 'propertyFeatures'])
                ->where('type',$val)
                ->Active()
                ->Sold()
                ->Pending()
                ->Deleted()
                ->get();
    }

    public function scopeActive($query, $value = true)
    {
        return $query->where('is_active', $value);
    }

    public function scopeSold($query, $value = false)
    {
        return $query->where('is_sold', $value);
    }

    public function scopePending($query, $value = false)
    {
        return $query->where('is_pending', $value);
    }

    public function scopeDeleted($query, $value = false)
    {
        return $query->where('is_deleted', $value);
    }

    public function scopeFeatured($query, $value = true)
    {
        return $query->where('is_featured', $value);
    }
}
