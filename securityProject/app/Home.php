<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
        //this is a model
        protected $table= 'coords';

        protected $fillable = [ //datos que podemos modificar 
            'lat', 'ing', 'coment','name','user'
        ];
    
        protected $visible = [ //datos que podemos modificar 
            'lat', 'ing', 'coment','name','user'
        ];
}
