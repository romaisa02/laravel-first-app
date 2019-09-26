
<!DOCTYPE html>
<html>
<head>
<title>Create page</title>
<style type="text/css">
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>
<h1>CREATE PROJECT</h1>
<form method="POST" action="/projects">
	{{csrf_field()}}
  Title<br>
  <input type="text" name="title" class="{{ $errors->has('title') ? 'is-danger' : '' }}" 
  value="{{ old('title') }}" required>
  <br>
  Description:<br>
  <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required>{{ old('description') }}</textarea>
  <br>
  <button type="submit">Create project</button>
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
</body>
</html>