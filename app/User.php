<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function photo(){
		return $this->belongsTo('App\Photo_User');
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
