<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App\Constituency', 'constituency_id', 'id');
    }

    public function party() {
        return $this->belongsTo('App\Party', 'party_id', 'id');
    }

    public function Posts() {
        return $this->hasMany('App\Post', 'candidate_id', 'id');
    }

    public function get_posts_lang($locale) {
        return $this->Posts()->where('language', $locale)->get();
    }

    public function description($locale) {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'location' => $this->location,
            'civil_status' => $this->civil_status,
            'function' => $this->function,
            'studies' => $this->studies,
            'date' => $this->date,
            'constituency' => $this->constituencies,
            'party' => $this->party,
            'posts' => $this->get_posts_lang($locale),
        ];
    }
}
