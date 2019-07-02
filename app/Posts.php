<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';

    public function candidate() {
        return $this->belongsTo('App\Candidate', 'candidate_id', 'id');
    }

    public function post_content() {
        return $this->hasMany('App\PostContent', 'post_id', 'id');
    }
}
