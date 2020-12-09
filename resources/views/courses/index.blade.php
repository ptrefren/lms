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
<h2>Courses</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('courses.create') }}"> Create Course</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Course Name</th>
<th>Course Description</th>
<th>Start Date</th>
<th>Weeks</th>
<th width="280px">Action</th>
</tr>
@foreach ($courses as $course)
<tr>
<td>{{ $course->id }}</td>
<td>{{ $course->course_name }}</td>
<td>{{ $course->course_description }}</td>
<td>{{ $course->start_date }}</td>
<td>{{ $course->weeks }}</td>
<td>
<form action="{{ route('courses.destroy',$course->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Edit</a>
<a class="btn btn-secondary" href="{{ route('coursesenrollment.show', $course->id) }}">Students</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $courses->links() !!}
</body>
</html>