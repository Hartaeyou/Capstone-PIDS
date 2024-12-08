<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $table = 'Point';
    protected $fillable = ['name', 'latitude', 'longitude'];
}
