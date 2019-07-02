<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageDistrict extends Model
{
    protected $table = 'language_district';
    public $primaryKey = 'id';

    public function language() {
        return $this->belongsTo('App\Language', 'language_id', 'id');
    }

    public function district() {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }
}
