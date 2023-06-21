<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function myProfile()
    {
        return $this->hasOne(MyProfile::class, 'user_id');
    }
}
