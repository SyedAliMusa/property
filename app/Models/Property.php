<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'agent_id')
            ->where('is_active', '=', true);
    }

    public function propertyImages() {
        return $this->hasMany(PropertyImages::class)
            ->where('is_deleted', '=', false);
    }

    public function propertyFeatures() {
        return $this->hasMany(PropertyFeatures::class);
    }

    public static function PropertyFeatured($limit) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Featured()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->latest()->take($limit)
            ->get();
    }

    public static function Property($val, $limit) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
                ->where('type',$val)
                ->Active()
                ->Sold()
                ->Pending()
                ->Deleted()
                ->latest()->take($limit)
                ->get();
    }

    public static function LastThreeProperty() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->latest()->take(3)
            ->get();
    }

    public static function LastThreeFeaturedProperty($limit = 3) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Featured()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->latest()->take($limit)
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
