<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public $primaryKey = 'id';

    public function locality() {
        return $this->hasMany('App\Locality');
    }

    public function constituencies() {
        return $this->belongsToMany('App\Constituencies');
    }
}
