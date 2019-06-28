<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituencies extends Model
{
    protected $table = 'constituencies';
    public $primaryKey = 'id';

    public function candidate() {
        return $this->hasMany('App\Candidate');
    }

    public function locality() {
        return $this->hasMany('App\Locality');
    }
}
