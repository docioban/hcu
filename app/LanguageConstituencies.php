<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageConstituencies extends Model
{
    protected $table = 'language_constituencies';
    public $primaryKey = 'id';

    public function constituency() {
        return $this->belongsTo('App\Constituency', 'constituency_id', 'constituency_name');
    }
}
