<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';
    public $primaryKey = 'id';

    public function locality() {
        return $this->belongsTo('App/Locality', 'id', 'locality_id');
    }
}
