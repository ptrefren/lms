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
<div class="pull-left mb-2">
<h2>Add Student</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>First Name:</strong>
<input type="text" name="first_name" class="form-control" placeholder="First Name">
@error('first_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Last Name:</strong>
<input type="text" name="last_name" class="form-control" placeholder="Last Name">
@error('last_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Matriculation Date:</strong>
<input type="date" name="matriculation_date" class="form-control" placeholder="matriculation_date">
@error('matriculation_date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Currently Enrolled:</strong>
<input type="checkbox" id="enrolled" name="enrolled" value="1">
@error('enrolled')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>