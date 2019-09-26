@extends('layout')

@section('content')

<h1>{{$project->title}}</h1>
<h1>{{$project->id}}</h1>
<p>
	<a href="/projects/{{$project->id}}/edit">Edit</a>

</p>
<div>

	<div class="box">
	
@foreach($project->tasks as $tasks)
<form method="POST" action="/tasks/{{$tasks->id}}">
	@csrf
	@method('PATCH')
	<label class="checkbox {{$tasks->completed?'is-completed':''}}" for="completed"> 
<input type="checkbox" name="completed" onchange="this.form.submit()" {{$tasks->completed?'checked':''}}>
{{$tasks->description}}
</label>

</form>
@endforeach

</div>
<div>
	<br/>
	<br/>
	<br/>
	<form action="/projects/{{$project->id}}/tasks" method="POST">
		@csrf

		<label>New Task</label>
		<br/>
		<input type="text" name="taskname">
		<button type="submit">Add task</button>
		 @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	</form>


</div>
</div>


@endsection