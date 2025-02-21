<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ</title>
    <!-- Link CSS with Vite -->
    @vite(['resources/css/app.css'])
    {{ $headSlot }}
</head>
<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
   
    <x-header></x-header>
 
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <main class="p-4 md:ml-64 h-auto pt-20">
      <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-4 mb-2">
        <div class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-12 md:h-16 bg-brand-medium text-gray-500 font-bold text-2xl flex items-center pl-4">
            {{ $headContentSlot ?? 'No heading' }}
        </div>
        <div class="border-2 bg-brand-light rounded-lg border-gray-300 dark:border-gray-600 min-h mb-4">
            {{ $mainContentSlot ?? 'No Content' }}
        </div>
      </div>
    </main>

  </div>
  <!-- Link JS with Vite -->
  @vite(['resources/js/app.js'])
  {{ $footerSlot }}
</body>
</html>