<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'post';

    public function candidate() {
        return $this->belongsTo('App\Candidate', 'candidate_id', 'id');
    }

    public function language() {
        return $this->belongsTo('App\Language', 'language_id', 'id');
    }
}
