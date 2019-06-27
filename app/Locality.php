<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'locality';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App/Constituencies');
    }
}
