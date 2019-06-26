<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deputat extends Model
{
    public function circumscription() {
        return $this->hasMany('App\circumscription', 'id', 'circumscription_id');
    }
}
