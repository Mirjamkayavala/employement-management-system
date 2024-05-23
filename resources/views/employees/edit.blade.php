
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Employee</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go to Dashboard</a>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update',$employee->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" value="{{ $employee->employee_id }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $employee->contact_number }}" required>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $employee->qualification }}" required>
            </div>
            <div class="form-group">
                <label for="hired_date">Hired Date:</label>
                <input type="date" class="form-control" id="hired_date" name="hired_date" value="{{ $employee->hired_date }}" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $employee->job_title }}" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
</body>
</html>

