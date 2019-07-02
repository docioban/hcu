<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    protected $table = 'post_content';
    public $primaryKey = 'id';

    public function posts() {
        return $this->belongsTo('App\Posts', 'id', 'post_id');
    }

    public function language() {
        return $this->belongsTo('App\Language', 'id', 'language_id');
    }
}
