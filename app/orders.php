<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $fillable = [
        'uname','fname','quantity','price','amount'
    ];
}
