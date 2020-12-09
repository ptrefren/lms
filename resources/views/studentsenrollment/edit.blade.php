<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>UA - LMS</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add Course Student</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('studentsenrollment.show', $student_id) }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('studentsenrollment.update',$student_id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<select name="course_id" id="">
	@foreach($courses as $course)
	<option value="{{$course->id}}">{{$course->course_name}}</option>
	@endforeach
</select>

<button type="submit" class="btn btn-primary ml-3">Add</button>
</div>
</form>
</div>
</body>
</html>