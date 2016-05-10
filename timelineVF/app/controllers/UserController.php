<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{	$user=User::find($id);
		$view=View::make('layout.showProfile')->with('user',$user);
		return $view;
	}

	public function updateProfile(){
		$inputs=Input::all();
		$user=User::find(Session::get('user')->id);
		$user->updateData($inputs['email'],$inputs['name'],$inputs['firstname'],$inputs['phone'],$inputs['adress'],$inputs['city'],$inputs['promotion'],$inputs['gender'],$inputs['datepicker']);
		return Redirect::to('user/'.$user->id);
	}

	public function editProfile(){
		$user=Session::get('user');
		$view=View::make('layout.editProfile')->with('user',$user);
		return $view;

	}
	public function deleteUser($id){
		$user=User::find($id);
		$user->delete();
		return Redirect::to('search');
	}
	public function getAll(){
		$users=User::all();
		$view=View::make('layout.searchUsers');
		$view->users=$users;
		return $view;
	}
	public function affich2(){

	$users=User::get()->first();
	print_r($users);
	}
	public function signIn(){

		$email=Input::get('email');
		$password=Input::get('password');

		if(Auth::attempt(['email'=>$email, 'password'=>$password])){
			
			$user=User::where('email',$email)->get()->first();				
				session_start();
				Session::put('user', $user);
				return Redirect::to('evenements');

			}
		
			else{
				if(User::checkEmail($email)==true){
					$view=View::make('layout.authentification')->with('msg',"pwd");
					return $view;	
				}
				else{
					$view=View::make('layout.authentification')->with('msg',"faux");
					return $view;
				}
		
			}			
			
		}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function signUp()
	{
		$email=Input::get('email');
		if(User::checkEmail($email)==false){
			$password=Hash::make(Input::get('password'));
			$name=Input::get('name');
			$firstname=Input::get('firstname');
			$phone=Input::get('phone');
			$adress=Input::get('adress');
			$city=Input::get('city');
			$promotion=Input::get('promotion');		
			$gender=Input::get('gender');
			$birthdate=Input::get('datepicker');
			if(Input::hasFile('photo')){
				$dest="images/profiles/";
				$nom=str_random(10).Input::file('photo')->getClientOriginalName();
				$photo=Input::file('photo')->move($dest,$nom);
			}
			else
			$photo="images/avartarB.jpg";

			User::SaveUser($email,$password,$name,$firstname,$phone,$adress,$city,$birthdate,$gender,$promotion,$photo);
			
				$user=User::where('email',$email)->get()->first();

				session_start();
				Session::put('user', $user);
				return Redirect::to('evenements');

			//$message= 'succes';
			//return Redirect::to('inscription')->with('message',$message);	
		}
		else{
			$view=View::make('layout.alert');
			$view->message=' inscrit';
			return $view;
		}			
	}

	/* function executed with AJAX*/
	public function search()
	{
		$keywords= Input::get('keywords');
		$users= User::all();

		$searchUsers= new \Illuminate\Database\Eloquent\Collection();

		foreach($users as $user){
			if(  (Str::contains(Str::lower($user->firstname),Str::lower($keywords))) or (Str::contains(Str::lower($user->name),Str::lower($keywords)))   )	
				$searchUsers->add($user);
		}
		return View::make('layout.searchedUsers')->with('users',$searchUsers);
		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}


	public function deconnexion(){
		Session::flush();
	return Redirect::to('/');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$user=User::find($id);
		$user->email= Input::get('email');
		$user->password=Hash::make(Input::get('nvpassword'));

		$user->save();
		return Redirect::to('user');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

/*
|--------------------------------------------------------------------------
| Admin functions
|--------------------------------------------------------------------------
|
*/
	
	
	//return the users signedUp and not confirmed yet
	public function signUpList(){
		$users= User::signUpList();
		return View::make('Layout.Admin.listeDemandes')->with('users',$users);
	}

}
