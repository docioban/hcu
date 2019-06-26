<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituencies extends Model
{
    protected $table = 'constituencies';
    public $primaryKey = 'id';

    public function district() {
        return $this->belongsToMany('App\District');
    }

    public function candidate() {
        return $this->hasMany('App\Candidate');
    }
}
