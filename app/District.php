<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public $primaryKey = 'id';

    public function locality() {
        return $this->hasMany('App\Locality', 'district_id', 'id');
    }

    public function language_district() {
        return $this->hasMany('App\LanguageDistrict', 'district_id', 'id');
    }
}
