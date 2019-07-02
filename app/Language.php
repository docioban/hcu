<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    public function post_content() {
        return $this->hasMany('App\PostContent', 'language_id', 'id');
    }

    public function language_constituencies() {
        return $this->hasMany('App\LanguageConstituencies', 'language_id', 'id');
    }

    public function language_district() {
        return $this->hasMany('App\LanguageDistrict', 'language_id', 'id');
    }

    public function language_locality() {
        return $this->hasMany('App\LanguageLocality', 'language_id', 'id');
    }

}
