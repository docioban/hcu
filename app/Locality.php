<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    // public function toArray()
    // {
    //     return [
    //         'constituency_id' => $this->constituency_id,
    //         'isCity' => $this->isCity,
    //     ];
    // } 

    public function constituency() {
        return $this->belongsTo('App\Constituency', 'constituency_id', 'id');
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

    public function get_locality_lang($var) {
        return $this->language_locality()
            ->where('language', app()->getLocale())
            ->get();
    }

    static public function search()
    {
        $model = self::where([]);
        return $model;
    }
}
