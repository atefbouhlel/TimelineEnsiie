<?php
$id=1;
?>
{{ Form::open(array('method'=>'put','url' => 'user/'.$id )) }}

	{{ Form::label('email','Email:') }}
	{{ Form::text('email') }} <br/>

	{{ Form::label('password','Password:') }}
	{{ Form::text('password') }} <br/>

	{{ Form::label('nvpassword','Nouveau Password:') }}
	{{ Form::text('nvpassword') }} <br/>

	{{ Form::submit('Edit') }}

{{ Form::close() }}