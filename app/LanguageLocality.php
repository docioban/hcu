<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageLocality extends Model
{
    protected $table = 'language_locality';
    public $primaryKey = 'id';

    public function locality() {
        return $this->belongsTo('App\Locality', 'locality_id', 'id');
    }
}
