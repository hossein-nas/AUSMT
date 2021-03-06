<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'name', 'email', 'password', 'user_type_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function post()
	{
		return $this->hasMany('App\Post');
	}

	public function usertype()
	{
		return $this->belongsTo("App\User_type", 'user_type_id');
	}
}
