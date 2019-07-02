<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App\Constituencies', 'constituency_id', 'id');
    }

    public function party() {
        return $this->belongsTo('App\Party', 'party_id', 'id');
    }

    public function Posts() {
        return $this->hasMany('App\Posts', 'candidate_id', 'id');
    }
}
