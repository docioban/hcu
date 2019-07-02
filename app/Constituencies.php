<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituencies extends Model
{
    protected $table = 'constituencies';
    public $primaryKey = 'id';

    public function candidate() {
        return $this->hasMany('App\Candidate', 'constituency_id', 'id');
    }

    public function locality() {
        return $this->hasMany('App\Locality', 'constituency_id', 'id');
    }

    public function language_constituencies() {
        return $this->hasMany('App\LanguageConstituencies', 'constituency_id', 'id');
    }
}
