<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'locality';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App/Constituence');
    }

    static public function search()
    {
        $model = self::where([]);
        return $model;
    }
}
