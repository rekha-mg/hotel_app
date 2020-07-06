<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class users extends Model
{
    //
protected $fillable = [
        'uname','phone','location'
    ];
}
