<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'username',
        'email',
        'content',
        'parent_id',
        'post_id'
    ];
    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function hasParent(){
        return $this->id;
    }
    public function getParentAttribute(){
        if(($this->parent_id!=0)){
            return Comment::find($this->parent_id);
        }else
            return false;
    }
}
