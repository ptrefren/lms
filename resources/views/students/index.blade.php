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
<h2>Students Courses</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('students.create') }}">Create Student</a>
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
<th>First Name</th>
<th>Last Name</th>
<th>Matriculation Date</th>
<th>Enrolled</th>
<th width="280px">Action</th>
</tr>
@foreach ($students as $student)
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->first_name }}</td>
<td>{{ $student->last_name }}</td>
<td>{{ $student->matriculation_date }}</td>
<td>{{ $student->enrolled ? 'Yes' : 'No' }}</td>
<td>
<form action="{{ route('students.destroy',$student->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
<a class="btn btn-secondary" href="{{ route('studentsenrollment.show', $student->id) }}">Courses</a>
@csrf
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $students->links() !!}
</body>
</html>