<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App\Constituencies');
    }

    public function party() {
        return $this->belongsTo('App\Party');
    }

    public function Posts() {
        return $this->hasMany('App\Posts');
    }
}
