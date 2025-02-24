<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System - @yield('title')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <div class="min-h-screen flex flex-col gap-1">
        <div class="flex flex-1 flex-col">
            <x-sidebar class="flex-1" />
            <main class="flex-1 bg-white mx-auto mr-3 ml-80 mt-1
             rounded-lg border border-y-1 border-x-1 border-gray-600 shadow-lg">
                {{ $slot }}
            </main>
        </div>
    </div>
  @vite('resources/js/app.js')
</body>
</html>
