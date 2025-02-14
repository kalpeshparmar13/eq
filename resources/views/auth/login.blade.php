<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ | Login</title>
    <!-- Link CSS with Vite -->
    @vite(['resources/css/app.css'])
</head>
<body class="dark:bg-gray-900 bg-brand-light">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen">
        <!-- Logo Section -->
        <a href="#" class="flex items-center justify-center text-2xl font-semibold mb-2 lg:mb-2 dark:text-white">
            <img src="{{ asset('logos/ir_logo.png') }}" class="mr-4 h-32" alt="Logo">
        </a>

        <!-- Title Section -->
        <h1 class="text-2xl font-semibold mb-8 text-gray-500 dark:text-white">
            Emergency Quota Application
        </h1>

        <!-- Flowbite Card -->
        <div class="w-full bg-cyan-100 rounded-lg shadow-md dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <!-- Login Header -->
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-500 md:text-2xl dark:text-white">
                    Login
                </h1>

                <!-- Form -->
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- PF No Input -->
                    <div>
                        <label for="pfno" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">PF No</label>
                        <input type="text" name="pfno" id="pfno" class="form-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-600 dark:focus:border-primary-600" placeholder="Enter PF Number" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="form-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-600 dark:focus:border-primary-600" value="password" required>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-full">
                        Login
                    </button>

                    <!-- Display any errors -->
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <!-- Link JS with Vite -->
    @vite(['resources/js/app.js'])
</body>
</html>
