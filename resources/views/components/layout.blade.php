<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System - @yield('title')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-1">
        <x-sidebar class="flex-1" />
        <main class="flex-1 bg-white mx-auto ml-80 mt-1 mr-2
         rounded-lg border border-y-2 border-x-2 border-gray-400 shadow-md">
            {{ $slot }}
        </main>
    </div>
  @vite('resources/js/app.js')
  <script src="resources/js/dropdown.js"></script>
</body>
</html>