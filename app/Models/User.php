<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'phone',
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

    public function isAdmin()
    {
        return $this->getKey() === 1;
    }

    public function getAvatarUrlAttribute()
    {
        $avatar = $this->attributes['avatar'];
        if(Str::startsWith($avatar, ['http://','https://'])){
            return $avatar;
        }
        return \Avatar::create($this->attributes['nickname'] ?? $this->attributes['name'])->toBase64();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscriptions()
    {
        return $this->subscriptions->reject->active();
    }

    public function subscribedPlans()
    {
        $planIds = $this->subscriptions->reject->active()->pluck('plan_id')->unique();

        return Plan::query()->whereIn('id', $planIds)->get();
    }

    public function subscribedTo($planId)
    {
        $subscription = $this->subscriptions()->where('plan_id', $planId)->first();

        return $subscription && $subscription->active();
    }

    public function newSubscription($plan, $start = null)
    {
        list($start, $end) =period($plan->interval, $plan->period, $start);

        return $this->subscriptions()->create([
            'plan_id' => $plan->getKey(),
            'starts_at' => $start,
            'ends_at' => $end,
        ]);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
