<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
@foreach($pap as $project)
<ul>

	<a href="/projects/{{$project->id}}">
<li>{{$project->title}}</li>
</a>
<li>{{$project->description}}</li>
<form method="POST" action="/projects/{{$project->id}}">.
	{{method_field('DELETE')}}
	{{csrf_field()}}

	<br/>
 <button type="submit">Delete project</button>

</form>
<form method="GET" action="/projects/{{$project->id}}/edit">
	{{method_field('HEAD')}}
	@csrf
	<button type="submit">Update project</button>
	</form>
</ul>
@endforeach

</body>
</html>