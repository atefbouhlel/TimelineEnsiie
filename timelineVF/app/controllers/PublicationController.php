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
			$dest="images/photos";

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
					Publication::savePublication($to,1,1,$rubric,Session::get('user')->id);
				}
			}
			//removing tmp file after done Inserting
			exec("rmdir /s /q tmp");
			return Redirect::to('rubriques/'.$event);

		}
	}
	public function uploadPhotos(){
		$events=Eventt::orderBy('date', 'desc')->get();
		$view=View::make('layout.uploadPhotos')->with('events',$events);
		return $view;
	}

		public function newRubric(){
		$events=Eventt::all();		
		$view=View::make('layout.newRubric')->with('events',$events);
		return $view;
	}
	

	public function CouvertureGallerie($id)
	{
		$t=array();
		$i=0;

		$rubriques = Rubric::where('event_id',$id)->orderBy('start', 'asc')->get();
		foreach ($rubriques as $rub) {
			$pub=Publication::where('rubric_id',$rub->id)->take(3)->get();
			$t[$i]=array('rub' =>$rub,'pub'=>$pub );
			$i++;
		}
		$view=View::make('layout.gallery')->with('t',$t);
		$view->event_id=$id;
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
		Publication::deleteAllComments($id_photo);
		Publication::deleteAllJaime($id_photo);
		return Redirect::to('evenements');
	}
public function telechargement($id){
		if(in_array("Zip.zip",scandir(".")))
			{
				exec("erase Zip.zip");
			}
		
		$pub=Publication::where('rubric_id',$id)->get();
		foreach ($pub as $p) {		
		$zip = new ZipArchive();
		if($zip->open('Zip.zip', ZipArchive::CREATE) == TRUE)
		{

    	$zip->addFile($p->url);
    		
    	$zip->close();
    	
		} 		
else {
    echo 'échec';

}
}
return Redirect::to('Zip.zip');




}

}
