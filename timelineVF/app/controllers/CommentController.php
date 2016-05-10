<?php

class CommentController extends BaseController {

	public function index($id_photo){
		$photo=Publication::find($id_photo);
		$comments=Comment::where('photo_id',$photo->id)->get();
		$i=0;
		foreach ($comments as $comment) {
			$who_comment[$i]=User::find($comment->user_id);
			$i++;
		}
		
		$jaime=Jaime::where('photo_id',$photo->id)->get()->count();
		$jaime_clicked=Jaime::checkMyJaime($id_photo);
		$view=View::make('layout.commentaires');
		$view->photo=$photo;
		$view->comments=$comments;
		$view->jaime=$jaime;
		$view->jaime_clicked=$jaime_clicked;
		if (isset($who_comment))
		$view->who_comment=$who_comment;
		return $view;
	}

	public function addComment()
	{
		$id_photo=$_POST['id_photo'];
		$text=$_POST['text'];
		$date="2016-05-09 10:18:14";

		Comment::saveComment($id_photo,$text,$date);
	}


}
