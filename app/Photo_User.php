<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_User extends Model
{
    //
	protected $uploads = '/images_user/';
	
	protected $fillable = ['file'];
	
	public function getFileAttribute($photo){
		return $this->uploads . $photo;
	}
}
