<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'locality';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App\Constituencies', 'constituency_id', 'id');
    }

    public function section() {
        return $this->hasMany('App\Section', 'locality_id', 'id');
    }

    public function district() {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }

    public function language_locality() {
        return $this->hasMany('App\LanguageLocality', 'locality_id', 'id');
    }

    static public function search()
    {
        $model = self::where([]);
        return $model;
    }
}
