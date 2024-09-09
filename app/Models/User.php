<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as UserAlias;
use Illuminate\Notifications\Notifiable;

class User extends UserAlias
{
    use HasFactory, Notifiable;

    protected $fillable =[
        'name',
        'email',
        'password',
    ];

    protected $hidden =[
        'password',
        'password-confirm',
    ];

    protected function casts()
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed'
        ];

    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
