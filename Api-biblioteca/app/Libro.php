<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function autor(){
        return $this->hasMany('App\Autor', 'autor');
    }
}
