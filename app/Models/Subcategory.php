<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public function subsubcategory(){
        return $this->hasMany('App\Models\Subsubcategory');
    }
}
