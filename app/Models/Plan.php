<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination_name',
        'schedule',
        'people',
        'items',
        'transportation',
    ];

    protected $table = 'plans';

    public function user()
    {
        return $this->belongsTo('App\Models\Plan');
    }
}
