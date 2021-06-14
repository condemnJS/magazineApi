<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $casts = [
        'images' => 'array'
    ];
    protected $guarded = [];

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function specifications()
    {
        return $this->hasMany('App\Models\Specification');
    }
}
