<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h2>Employee List</h2>
    
    @if(auth()?->user()?->role == 'admin')
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
    @endif
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    <table>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email</th>
            <th> Date Of Birth</th>
            <th>Contact Number</th>
            <th>Qualification</th>
            <th>Hired Date</th>
            <th>Job Title</th>
            <th>Department</th>
            <!-- <th>Actions</th> -->
            @if(auth()?->user()?->role == 'admin')
                    <th>Actions</th>
                @endif
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->date_of_birth}}</td>
                <td>{{ $employee->contact_number }}</td>
                <td>{{ $employee->qualification }}</td>
                <td>{{ $employee->hired_date }}</td>
                <td>{{ $employee->job_title }}</td>
                <td>{{ $employee->department }}</td>
                <td>
                    @if(auth()?->user()?->role == 'admin')
                        <a href="{{ route('employees.show', ($employee->id) ? $employee->id : '1' ) }}">VIEW</a>
                        <a href="{{ route('employees.edit',  ($employee->id) ? $employee->id : '1' ) }}">UPDATE</a>
                      
                        <!-- <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">DELETE</button>
                        </form> -->

                        <form action="{{ route('employees.destroy',  ($employee->id) ? $employee->id : '1' ) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <!-- Pagination links --> 
    <div class="mt-5">
        {{$employees->links()}}
         
    </div>
</body>
</html>

