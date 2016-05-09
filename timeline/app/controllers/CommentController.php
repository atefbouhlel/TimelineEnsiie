<?php

class CommentController extends BaseController {

	public function index($id_photo){
		$photo=Publication::find($id_photo);
		$comments=Comment::where('photo_id',1)->get();//à modifier !! where('user_id')
		$jaime=Jaime::where('photo_id',1)->get()->count();// à modifier
		$jaime_clicked=Jaime::checkMyJaime($id_photo);
		$view=View::make('layout.commentaires');
		$view->photo=$photo;
		$view->comments=$comments;
		$view->jaime=$jaime;
		$view->jaime_clicked=$jaime_clicked;
		return $view;
	}

	public function addComment()
	{
		$id_photo=$_POST['id_photo'];
		$text=$_POST['text'];

		Comment::saveComment($id_photo,$text);
	}


}
