<?php

class PublicationController extends \BaseController {

	
	public function upload_button(){
		$event=Input::get('event');
		$rubric=Input::get('rubric');

		if(Input::hasFile('photos')){
			$file=Input::file('photos');
			//testing if the temporary file where will be extracting the images exist or not
			if(!in_array("tmp",scandir(".")))
			{
				exec("mkdir tmp");
			}
			$dest="images\photos";

			$zip = new ZipArchive;
			if ($zip->open($file) === TRUE) {
	    		$zip->extractTo('tmp');
	    		$zip->close();
			}
			else
			{
				echo'error';
			}	
			$photos=scandir("tmp");
			for($i=2;$i<count($photos);$i++) {
				if(Publication::is_image("tmp/".$photos[$i])){
					$from="tmp/".$photos[$i];
					$to="images/photos/".str_random(5).$photos[$i];
					copy($from,$to);
					Publication::savePublication($to,1,1,$rubric,1);
				}
			}
			//removing tmp file after done Inserting
			exec("rmdir /s /q tmp");

		}
	}
	public function uploadPhotos(){
		$events=Eventt::all();
		$view=View::make('layout.uploadPhotos')->with('events',$events);
		return $view;
	}
	

	public function CouvertureGallerie($id)
	{
		$t=array();
		$i=0;

		$rubriques = Rubric::where('event_id',$id)->get();
		foreach ($rubriques as $rub) {
			$pub=Publication::where('rubric_id',$rub->id)->take(3)->get();
			$t[$i]=array('rub' =>$rub,'pub'=>$pub );
			$i++;
		}
		$view=View::make('layout.gallery')->with('t',$t);
		return $view;		
	}

	public function chargement($id){

		$pub=Publication::where('rubric_id',$id)->get();
		$view=View::make('layout.chargementPhoto')->with('photo',$pub);
		return $view;
		
	}

	public function deletePhoto(){
		$id_photo=Input::get('id_photo');
		Publication::deletePhoto($id_photo);
		return Redirect::to('evenements');
	}

	public function telechargement($id){
		//rmdir("f");
		$f=mkdir("f", 0700);
		$i=0;
		$pub=Publication::where('id',$id)->get();
		foreach ($pub as $p) {
			$new='f/'.$i;
			$i++;
			copy('photos/'.$p->url,'f/'.$p->url);
		}
		

		
		
		 $zip = new ZipArchive();



	}



}
