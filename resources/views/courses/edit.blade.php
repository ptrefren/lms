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
<h2>Edit Course</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('courses.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Course Name:</strong>
<input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" placeholder="Course name">
@error('course_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Course Description:</strong>
<input type="text" name="course_description" class="form-control" placeholder="Course Description" value="{{ $course->course_description }}">
@error('course_description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Start Date:</strong>
<input type="date" name="start_date" value="{{ $course->start_date }}" class="form-control" placeholder="Start Date">
@error('start_date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Weeks:</strong>
<input type="text" name="weeks" value="{{ $course->weeks }}" class="form-control" placeholder="Weeks">
@error('weeks')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</body>
</html>