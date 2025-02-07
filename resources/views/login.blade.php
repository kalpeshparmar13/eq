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
        <a href="#" class="flex items-center justify-center text-2xl font-semibold mb-4 lg:mb-4 dark:text-white">
            <img src="{{ asset('logos/ir_logo.png') }}" class="mr-4 h-20" alt="Logo">
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
                <form class="space-y-4 md:space-y-6" action="#">
                    <!-- PF No Input -->
                    <div>
                        <label for="pfno" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">PF No</label>
                        <input type="text" name="pfno" id="pfno" class="form-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-600 dark:focus:border-primary-600" placeholder="Enter PF Number" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="form-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-600 dark:focus:border-primary-600" required>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link JS with Vite -->
    @vite(['resources/js/app.js'])
</body>
</html>
