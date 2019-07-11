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

    public function toArray()
    {
        return [

            'number' => $this->constituency_name,
            'slug' => $this->slug,
            'number_of_voters' => $this->number_of_voters,
            'translate' => $this->get_constituency_lang(),
        ];
    }

    public function candidate() {
        return $this->hasMany('App\Candidate');
    }

    public function locality() {
        return $this->hasMany('App\Locality');
    }

    public function language_constituencies() {
        return $this->hasMany('App\LanguageConstituencies');
    }

    public function get_constituency_lang() {
        return $this->language_constituencies()->where('language', app()->getLocale())->first();
    }

    public function through_locality()
    {
        return $this->hasManyThrough('App\LanguageLocality', 'App\Locality');
    }

    public function get_locality_lang() {
        return $this->through_locality()->where('language', app()->getLocale())->get();
    }

    public function description() {
        return [
            'slug' => $this->slug,
            'number_of_voters' => $this->number_of_voters,
            'translate' => $this->get_constituency_lang(),
            'localities' => $this->get_locality_lang(),
            'candidates' => $this->candidate,
        ];
    }
}
