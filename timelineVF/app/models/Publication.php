<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Publication extends Eloquent implements  RemindableInterface {

	use RemindableTrait;
	protected $fillable=array('url','validation','type','rubric_id','user_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'publication';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');

	public function getPhotosById($user_id){
		return Publication::where('user_id',$user_id)->get();
	}

	public static function is_image($path)
	{
	    $info = getimagesize($path);
	    $image_type = $info[2];
	     
	    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	    {
	        return true;
	    }
	    return false;
	}
	public static function savePublication($url,$validation,$type,$rubric_id,$user_id){
		$publication=new Publication;		
		$publication->url=$url;
		$publication->validation=$validation;
		$publication->type=$type;
		$publication->rubric_id=$rubric_id;
		$publication->user_id=$user_id;
		$publication->save();
	}

	public static function deletePhoto($id_photo){
		$photo=Publication::find($id_photo);
		$photo->delete();
	}

	public static function deleteAllComments($id_photo){
		$comments=Comment::where('photo_id',$id_photo)->get();
		foreach ($comments as $comment) {
			$comment->delete();
		}
	}

	public static function deleteAllJaime($id_photo){
		$jaimes=Jaime::where('photo_id',$id_photo)->get();
		foreach ($jaimes as $jaime) {
			$jaime->delete();
		}
	}


	

}
