<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_Product extends Model
{
    //
	protected $uploads = '/images_product/';
	
	protected $fillable = ['file'];
	
	public function getFileAttribute($photo){
		return $this->uploads . $photo;
	}
}
