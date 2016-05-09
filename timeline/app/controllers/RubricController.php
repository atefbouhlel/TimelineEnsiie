<?php

class RubricController extends BaseController {

	
	public function getRubrics()
	{
		$event_id=$_POST['id'];
		$rubrics=Rubric::where('event_id',$event_id)->get();
		return json_encode($rubrics);		
	}




}
