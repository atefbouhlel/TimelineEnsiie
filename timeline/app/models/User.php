<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $fillable=array('email','password','name','firstname','tel','adress','city','birthdate','gender','promo','url_photo','isAdmin');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function updatePassword($newPassword){
		$this->password=Hash::make($newPassword);		
		$this->save();
	}
	public static function SaveUser($email,$password,$name,$firstname,$phone,$adress,$city,$birthdate,$gender,$promo,$url_photo){
		$user=new User;
		$user->email=$email;		
		$user->password=$password;
		$user->name=$name;
		$user->firstname=$firstname;
		$user->tel=$phone;
		$user->adress=$adress;
		$user->city=$city;
		$user->birthdate=$birthdate;
		$user->gender=$gender;
		$user->promo=$promo;
		$user->url_photo=$url_photo;
		$user->isAdmin=0;
		$user->isPres=0;
		$user->save();
	}

	public function updateData($email,$name,$firstname,$tel,$adress,$city,$birthdate,$gender,$promo,$url_photo){
		$this->name=$name;
		$this->firstname=$firstname;		
		$this->tel=$tel;
		$this->adress=$adress;
		$this->city=$city;
		$this->birthdate=$birthdate;
		$this->gender=$gender;
		$this->promo=$promo;
		$this->url_photo=$url_photo;
		$this->save();
	}

	public static function checkEmail($email){
		$nb= User::where('email',$email)->count();
		if($nb==0)
			return false;
		else
			return true;

	}

/*
|--------------------------------------------------------------------------
| Admin functions
|--------------------------------------------------------------------------
|
*/
	//count the number of inscriptions not confirmed yet
	public function signUpWaiting(){
		$count = Avocat::where('isConfirm', '=', 0)->count();
		return $count;
	}

	//return the users signedUp and not confirmed yet
	public function signUpList(){
		$users=User::where('isConfirm','=',0)->get();
		return $users;
	}

}
