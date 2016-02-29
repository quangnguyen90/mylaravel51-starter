<html>
<head>
	<title>View articles</title>
</head>
<body>
	<a href="http://localhost/myLaravelDemo/articles/create">Create new article</a>
	<ul>
	@foreach($articles as $article)
		<li><a href="http://localhost/myLaravelDemo/articles/{{$article->id}}/edit">Edit</a> ID: {{$article->id}}| Name : {{$article->name}} | Author : {{$article->author}} | {{$article->created_at}}</li>
	@endforeach
	</ul>
</body>
</html>