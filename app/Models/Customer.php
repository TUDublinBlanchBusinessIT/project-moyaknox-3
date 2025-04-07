<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Add your fillable attributes here:
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
