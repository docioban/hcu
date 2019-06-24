<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institutie extends Model
{
    protected $fillable = [
        'id', 'nume', 'sectie',
    ];
}
