<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .right-align {
            float: right;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Search Form -->
    <form  method="GET" align ="center" >
        <input type="search" name="query" placeholder="Search..." required>
        
        <button type="submit">Search</button>
    </form>
    <div class="clearfix">
        <!-- Dashboard button -->
        <a href="{{ route('dashboard') }}" class="btn btn-secondary right-align">Back to Dashboard</a>
    </div>
    
    <!--Display Results-->
    @if(isset($results))
        <h2>Search Results:</h2>
        <ul>
            @foreach($results as $result)
                <li>{{ $result->name }}</li>
                
            @endforeach
        </ul>
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
            <th>Actions</th>
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
                <a href="{{ route('employees.index') }}">Back to list</a> 
                <!-- <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go to Dashboard</a> -->
            </td>
        @endforeach


        
    </table>


    <div class="mt-5">
        {{$employees->links()}}
    </div>
    
</body>
</html>
