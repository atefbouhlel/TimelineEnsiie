<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getAll()
	{
		$events=Eventt::all();
		$view=View::make('layout.events');
		$view->events=$events;
		return $view;
	}
	
	public function createEvent()
	{		
		$event_title=Input::get('event_title');
		$event_date=Input::get('datepicker');
		if(Input::hasFile('event_photo')){
			$dest="images\profiles";
			$name=str_random(10).Input::file('event_photo')->getClientOriginalName();
			$event_photo=Input::file('event_photo')->move($dest,$name);
		}
		else
		$event_photo="\images\avartarB.jpg";

		$id_event=Eventt::saveEvent($event_title,$event_date,$event_photo);
		$rubrics=Input::get('rubrics');
		$tab=explode(',',$rubrics);
		for ($i=0; $i < count($tab) ; $i=$i+3) {
			Rubric::saveRubric($tab[$i],$tab[$i+1],$tab[$i+2],$id_event);
		}

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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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


}
