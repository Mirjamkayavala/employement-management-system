<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>

body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}
    form {border: 8px solid #f1f1f1;}

    input[type=text], input[type=name] {
    width: 100%;
    padding: 15px;
    margin: 5px 10 22px 10px; 
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text], input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 10 22px 10px; 
    
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 10px 22px 10px;
    
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    /* Full-width input fields */
    input[type=text], input[type=confirm_password] {
    width: 100%;
    padding: 15px;
    margin: 5px 10 22px 10px;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }


    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 5px 10 22px 10px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    button:hover {
    opacity:1;
    }

    .register-container {
                    background-color: rgba(255, 255, 255, 0.8); /* White with transparency */
                    padding: 2rem;
                    border-radius: 0.5rem;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                

    /* Add padding to container elements */
    .container {
    padding: 16px;
    margin-left: 100px;
    margin-right: 50px;


    }

    /* Clear floats */
    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
        width: 100%;
    }
    }
    </style>

</head>
<body>
    <div class="container m-auto p-3">
        
    <div class="register-title text-center text-success m-3">
        <h3>
        Registration Form

        </h3>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="field-set p-3">
            
        <!-- Role Selection -->
        <div class="mt-4 mb-3">
            <x-input-label for="role" :value="__('Register As')" />
                <select id="role" name="role" class="block mt-1 form-control" required>
                    <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
            
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        </div>
    </form>
    </div>
</body>
</html>