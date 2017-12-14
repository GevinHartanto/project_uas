<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $fillable = [
		'name',
		'cost',
		'category_id',
	];
	
	public function photo(){
		return $this->belongsTo('App\Photo_Product');
	}	
	
	public function category(){
		return $this->belongsTo('App\Category');
	}
	
	public function transaction(){
		return $this->hasMany('App\Transaction');
	}
	
	public function getCreatedAtAttribute($value)
	{
		$bulan = date('n', strtotime($value));
		$tanggal = date('j', strtotime($value));
		$tahun = date('y', strtotime($value));
		
		switch($bulan)
		{
			case 1: $bulan = "Januari"; break;
			case 2: $bulan = "Febuari"; break;
			case 3: $bulan = "Maret"; break;
			case 4: $bulan = "April"; break;
			case 5: $bulan = "Mei"; break;
			case 6: $bulan = "Juni"; break;
			case 7: $bulan = "Juli"; break;
			case 8: $bulan = "Agustus"; break;
			case 9: $bulan = "September"; break;
			case 10: $bulan = "Oktober"; break;
			case 11: $bulan = "November"; break;
			case 12: $bulan = "Desember"; break;

		}

	return $tanggal . " " .$bulan. " " .$tahun;

	//return date(" j M Y", strtotime($value));
	}
	
	
	public function getUpdatedAtAttribute($value)
	{
		$bulan = date('n', strtotime($value));
		$tanggal = date('j', strtotime($value));
		$tahun = date('y', strtotime($value));
		
		switch($bulan)
		{
			case 1: $bulan = "Januari"; break;
			case 2: $bulan = "Febuari"; break;
			case 3: $bulan = "Maret"; break;
			case 4: $bulan = "April"; break;
			case 5: $bulan = "Mei"; break;
			case 6: $bulan = "Juni"; break;
			case 7: $bulan = "Juli"; break;
			case 8: $bulan = "Agustus"; break;
			case 9: $bulan = "September"; break;
			case 10: $bulan = "Oktober"; break;
			case 11: $bulan = "November"; break;
			case 12: $bulan = "Desember"; break;

		}

	return $tanggal . " " .$bulan. " " .$tahun;

	//return date(" j M Y", strtotime($value));
	}
}
