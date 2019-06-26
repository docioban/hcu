<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'locality';
    public $primaryKey = 'id';

    public function section() {
        return $this->hasMany('App\Section');
    }

    public function district() {
        return $this->belongsTo('App\District');
    }
}
