<?php

namespace App\Models;

use App\Models\Options\WithImages;
use App\Models\Options\WithSearch;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, WithImages, WithSearch;

    protected $fillable = [
        'name',
        'email',
        'password',
        'provider_id',
        'provider',
        'phone',
        'avatar',
        'birthday',
        'gender',
        'subscribed',
        'received_offer',
        'active'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' =>  'datetime',
        'birthday'          =>  'datetime',
        'avatar'            =>  'array',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function address(): HasOne
    {
        return $this->hasOne(UserAddress::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function getAvatarAttribute()
    {
        if (empty($this->avatar)) {
            return [
                'link' =>  [asset('images/user.jpg')],
                'path' =>  [asset('images/user.jpg')],
            ];
        } else {
            return $this->avatar;
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function hasAccess(array $permissions): bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if ($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    public function inRole(string $roleSlug)
    {
        return $this->roles()->whereSlug($roleSlug)->count() == 1;
    }
}
