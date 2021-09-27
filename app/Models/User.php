<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'agent_id');
    }

    public function soldProperties(): HasMany
    {
        return $this->hasMany(Property::class, 'agent_id')->where('is_sold', '=', true);;
    }

    public static function allAgentsCount(){
        return User::role('agent')
            ->count();
    }

    public static function allFeaturedAgentCount() {
        return User::role('agent')
            ->Featured()
            ->count();
    }

    public static function allFeaturedAgents() {
        return User::role('agent')->with('properties')
            ->Active()
            ->Featured()
            ->Confirmed()
            ->get();
    }

    public static function limitFeaturedAgents($limit) {
        return User::role('agent')
            ->Active()
            ->Featured()
            ->Confirmed()
            ->latest()->take(3)
            ->get();
    }

    public static function latestAgents($limit) {
        return User::role('agent')
            ->Active()
            ->Confirmed()
            ->latest()->take($limit)
            ->get();
    }

    public function scopeActive($query, $value = true)
    {
        return $query->where('is_active', $value);
    }

    public function scopeConfirmed($query, $value = true)
    {
        return $query->where('is_confirmed', $value);
    }

    public function scopeFeatured($query, $value = true )
    {
        return $query->where('is_feature', $value);
    }
}
