<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = [
        'title',
        'hifen_title',
        'content',
        'user_id',
        'post_type',
        'image',
        'visit',
        'addToSlider',
        'priority'
    ];

    // author
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
