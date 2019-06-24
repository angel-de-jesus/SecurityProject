<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table= 'coords';

    protected $fillable = [ 
        'lat', 'ing', 'coment','name','user'
    ];

    protected $visible = [ 
        'lat', 'ing', 'coment','name','user'
    ];
}
