<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System Dashboard</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex: 1;
            justify-content: space-between; /* Aligns items at the ends of the container
            /* align-items: flex-start; */ */
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 15px;
            background-color: #007BFF;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }
        .user-profile {
            background-color: #495057;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            align-self: flex-start;
            
            margin-left: auto;
        }
        
        .user-profile {
            position: relative;
            top:-350px;
        }
        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .logout-button {
            text-decoration: none;
            color: white;
            padding: 10px;
            background-color: #dc3545;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
            margin-top: auto; /* Aligns the button to the bottom of the container */
        }
        .logout-button:hover {
            background-color: #c82333;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            @if(auth()->user()->role =='admin')
            <a href="\employees\create">Add Employee</a>
            @endif
            <a href="\employees\show">Employee Details</a>
            <!-- <a href="\employees\edit">Update Employee</a>
            <a href="\employees\edit">Delete Employee</a> -->
        </div>
        <div class="main-content">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="header">
                <h1>Employee Management System Dashboard</h1>
            </div>
            <p>Welcome to the Employee Management System Dashboard. Please select an option from the sidebar to get started.</p>
            <div class="user-profile">
                <!-- <img src="https://via.placeholder.com/50" alt="User Profile Picture"> -->
                <p>{{auth()->user()->name}}</p>
                <!-- <a href="/logout" class="logout-button">Log Out</a> -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>

                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log Out
                </button>
            </div>
            
        </div>
    </div>
</body>
</html>
