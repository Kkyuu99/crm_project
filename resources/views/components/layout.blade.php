<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen flex flex-col gap-1">
        <div class="flex flex-1 flex-col">
            <x-sidebar class="flex-1" />
            <main class="flex-1 bg-white mx-auto mr-3 ml-80 mt-1
             rounded-lg ">
                {{ $slot }}
            </main>
        </div>
    </div>
  @vite('resources/js/app.js')
</body>
</html>