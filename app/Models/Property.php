<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id')
            ->where('is_active', '=', true);
    }

    public function propertyImages(): HasMany
    {
        return $this->hasMany(PropertyImages::class)
            ->where('is_deleted', '=', false);
    }

    public function propertyFeatures(): HasMany
    {
        return $this->hasMany(PropertyFeatures::class);
    }

    public static function allPropertyCount() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->count();
    }

    public static function allProperty() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->get();
    }

    public static function soldPropertyCount() {
        return Property::Active()
                    ->Sold(true)
                    ->count();
    }

    public static function soldProperty() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold(true)
            ->Pending()
            ->Deleted()
            ->get();
    }

    public static function latestSoldProperty($limit) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold(true)
            ->Pending()
            ->Deleted()
            ->latest()->take($limit)
            ->get();
    }

    public static function deletedPropertyAll() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Deleted(true)
            ->get();
    }

    public static function featuredPropertyAll() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Featured()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->get();
    }

    public static function inActivePropertyAll() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active(false)
            ->Deleted()
            ->get();
    }

    public static function featuredProperty($limit) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Featured()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->latest()->take($limit)
            ->get();
    }

    public static function getTypedProperty($val, $limit) {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
                ->where('type',$val)
                ->Active()
                ->Sold()
                ->Pending()
                ->Deleted()
                ->latest()->take($limit)
                ->get();
    }

    public static function lastThreeProperty() {
        return Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->latest()->take(3)
            ->get();
    }

    public static function lastThreeFeaturedProperty($limit = 3) {
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
