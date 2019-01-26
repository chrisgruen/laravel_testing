<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
 
	/**
	 *
	 * Relationships to user
	 */
	public function roles()
	{
		return $this->belongsToMany('App\User');
	}
}
