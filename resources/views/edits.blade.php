@extends('layout')

@section('content')
<h1>Edit page
</h1>
<form method="POST" action="/projects/{{$project->id}}">
	@method('PATCH')
	@csrf

<input type="text" name="title" value="{{$project->title}}">
  <br>
  Description:<br>
  <textarea name="description" >{{$project->description}} </textarea>
  <br>
  <button type="submit">Update project</button>

</form>
<form method="POST" action="/projects/{{$project->id}}">.
	{{method_field('DELETE')}}
	{{csrf_field()}}

	<br/>
 <button type="submit">Delete project</button>

</form>
@endsection
