<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $table = 'constituencies';
    public $primaryKey = 'id';

    protected $fillable = [
        'name', 'slug', 'number_of_voters',
    ];

    public function candidate() {
        return $this->hasMany('App\Candidate');
    }

    public function locality() {
        return $this->hasMany('App\Locality');
    }
}
