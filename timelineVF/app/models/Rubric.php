<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rubric extends Eloquent implements  RemindableInterface {

	use RemindableTrait;
	protected $fillable=array('name','start','finish');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rubric';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');

	public static function saveRubric($name,$start,$end,$id_event){
		$rubric=new Rubric;
		$rubric->name=$name;
		$rubric->start=$start;
		$rubric->end=$end;
		$rubric->event_id=$id_event;
		$rubric->save();
	}

	

}
