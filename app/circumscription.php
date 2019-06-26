<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class circumscription extends Model
{
    public function deputati() {
        return $this->hasMany('App\Deputat', 'circumscription_id', 'id');
    }
}
