<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = [
        'destination_name',
        'description',
        'city',
        'address',
        'price',
        'facilities',
        'image',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}
