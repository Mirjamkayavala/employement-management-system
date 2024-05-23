
<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Employee</h2>

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

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="email">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_bith" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" class="form-control" id="qualification" name="qualification" required>
            </div>
            <div class="form-group">
                <label for="hired_date">Hired Date:</label>
                <input type="date" class="form-control" id="hired_date" name="hired_date" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Employee</button>
        </form>

        @if ($errors ->any())
            <div class="w-4/8 m-auto text-center">
                @foreach ($errors->all() as $errors)
                <li class = "text-red-500 list-none">
                    {{$error}}
                </li>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
