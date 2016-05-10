<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Eventt extends Eloquent implements  RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $fillable=array('name','date','url_photo_couverture','user_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'event';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');

	public static function saveEvent($event_title,$event_date,$event_photo){
		$event=new Eventt;
		$event->name=$event_title;
		$event->date=$event_date;
		$event->url_photo_couverture=$event_photo;
		$event->user_id=1;//à modifier par session('user')
		$event->save();
		return $event->id;
	}

}
