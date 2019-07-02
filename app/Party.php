<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'party';
    public $primaryKey = 'id';

    public function candidate() {
        return $this->hasMany('App\Candidate', 'party_id', 'id');
    }
}
