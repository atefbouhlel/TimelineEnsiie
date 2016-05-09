<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Jaime extends Eloquent implements  RemindableInterface {

	use RemindableTrait;
	protected $fillable=array('photo_id','user_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jaime';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');

	public static function checkMyJaime($id_photo)
	{
		$nb=Jaime::where('user_id',1)->where('photo_id',1)->get()->count();
		if ($nb==0)
			return "false";
		else
			return "true";
	}

	public static function saveJaime($id_photo){
		$jaime=new Jaime;
		$jaime->photo_id=$id_photo;
		$jaime->user_id=1;
		$jaime->save();
	}

	public static function deleteJaime($id_photo){
		$jaime=Jaime::where('user_id',1)->where('photo_id',1)->get()->first();
		$jaime->delete();
	}

}
