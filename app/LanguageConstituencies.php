<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageConstituencies extends Model
{
    protected $table = 'language_constituencies';
    public $primaryKey = 'id';

    public function constituencies() {
        return $this->belongsTo('App\Constituencies', 'constituency_id', 'constituency_name');
    }
}
