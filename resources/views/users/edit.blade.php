<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Edit user infor in Laravel 5</title>
</head>
<body>
<h1>Edit user infor</h1>
 @if(Session::has('message'))
  <p>
   {{Session::get('message')}}
  </p>
 @endif
 {!! Form::model($user, array('method'=>'put','route'=>['users.update',$user->id],'class'=>'form')) !!}
 {!! Form::label('Name')!!}
 {!! Form::text('name',null,array('required','class'=>'form-control','placeholder'=>'Your name')) !!}
 {!! Form::label('Email')!!}
 {!! Form::text('email',null,array('required','class'=>'form-control','placeholder'=>'Your email')) !!}
 {!! Form::submit('Update!')!!}
 {!! Form::close() !!}
</body>
</html>