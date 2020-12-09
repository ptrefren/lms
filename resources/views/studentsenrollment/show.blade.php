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
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data"> Back</a>
</div>


<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('studentsenrollment.edit', $student_id) }}">Add Course</a>
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
<th>Enrollment ID</th>
<th>Course ID</th>
<th>Course Name</th>
</tr>
@foreach ($enrollments as $enrollment)
<tr>
<td>{{ $enrollment->id }}</td>
<td>{{ $enrollment->course_id }}</td>
<td>{{ $enrollment->course_name }}</td>
</tr>
@endforeach
</table>

</body>
</html>