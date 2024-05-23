<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 3px solid #f1f1f1;}
                .login-bg {
                    background-color: #87CEEB; /* Clear sky blue */
                    min-height: 100vh;
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    box-sizing: border-box;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }
                input[type=text], input[type=email] {
                    width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    display: inline-block;
                    border: none;
                    background: #f1f1f1;
                }

                    /* Full-width input fields */
                input[type=text], input[type=password] {
                    width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    display: inline-block;
                    border: none;
                    background: #f1f1f1;
                }

                button {
                    background-color: #04AA6D;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                }

                button:hover {
                    opacity: 0.8;
                }

                .login-container {
                    background-color: rgba(255, 255, 255, 0.8); /* White with transparency */
                    padding: 2rem;
                    border-radius: 0.5rem;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                
                

               

                .container {
                    padding: 16px;
                }

                span.psw {
                    float: right;
                    padding-top: 16px;
                }

                
                .title {
                    font-size: 2rem;
                    font-weight: bold;
                    margin-bottom: 1rem;
                    text-align: center;
                }

                .form-group {
                    margin-bottom: 1.5rem;
                }

                .form-group label {
                    display: block;
                    margin-bottom: 0.5rem;
                    font-weight: 600;
                }

                .form-group input[type="checkbox"] {
                    margin-right: 0.5rem;
                }

                .form-group .text-input {
                    width: 100%;
                }

                .form-group .input-error {
                    margin-top: 0.25rem;
                    color: #e3342f; /* Tailwind CSS red-600 */
                }

                .flex-space-between {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
        </style>

    </head>


<body>
    <div class="login-bg">
        <div class="login-container w-full max-w-md">
            <h1 class="title">Employment Management System</h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-5 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-4" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-5 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-4" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-5 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

