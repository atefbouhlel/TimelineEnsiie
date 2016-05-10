<?php

class RubricController extends BaseController {

	
	public function getRubrics()
	{
		$event_id=$_POST['id'];
		$rubrics=Rubric::where('event_id',$event_id)->orderBy('start', 'desc')->get();
		return json_encode($rubrics);		
	}


	public function saveRubric()
	{
		$event=Input::get('event');
		$rubric=Input::get('newRubric');
		$debut=Input::get('debut');
		$fin=Input::get('fin');
		Rubric::saveRubric($rubric,$debut,$fin,$event);
		return Redirect::to('evenements');
			
	}

public function supprimer($id){
		$rubrique = Rubric::find($id);
		$event_id=$rubrique->event_id;
		$photos=Publication::where('rubric_id',$id);
		foreach ($photos as $photo) {
			$photo->delete();
		}
		$rubrique->delete();
		return Redirect::to('rubriques/'.$event_id);
		

	}
}
