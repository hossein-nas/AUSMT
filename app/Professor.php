<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'field',
        'science_ranking',
        'educational_group',
        'college',
        'image',
        'homepage'
    ];
}
