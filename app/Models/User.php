<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // THESE METHODS MUST BE INSIDE THE CLASS
    public function customer()
    {
        return $this->hasOne(\App\Models\Customer::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(
            \App\Models\Order::class,
            \App\Models\Customer::class,
            'user_id',
            'customer_id',
            'id',
            'id'
        );
    }
} // ✅ <- make sure this closing brace is at the end of the file
