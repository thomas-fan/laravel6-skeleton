<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Admin extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'username',
        'name',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'guard' => 'admin'
        ];
    }
}
