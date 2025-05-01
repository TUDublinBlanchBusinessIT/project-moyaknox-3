<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Florist;


class Bouquet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'florist_id', 'image'];

    public function Florist()
    {
        return $this->belongsTo(Florist::class);
    }
}


