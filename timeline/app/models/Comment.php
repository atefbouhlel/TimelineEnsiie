<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comment extends Eloquent implements  RemindableInterface {

	use RemindableTrait;
	protected $fillable=array('text','photo_id','user_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comment';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');

	public static function saveComment($id_photo,$text){
		$comment=new Comment;
		$comment->photo_id=$id_photo;
		$comment->user_id=1;
		$comment->text=$text;
		//date à ajouter
		$comment->save();
	}

}
