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
<<<<<<< HEAD

    <div class="min-h-screen flex flex-col gap-1">
        <div class="flex flex-1 flex-col">
            <x-sidebar class="flex-1" />
            <main class="flex-1 bg-white mx-auto mr-3 ml-80 mt-1
             rounded-lg border border-y-1 border-x-1 border-gray-600 shadow-lg">
                {{ $slot }}
=======
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="min-h-screen flex flex-col gap-1">
        <div class="flex flex-1 flex-col">
            @if(!request()->is('login')) <!-- Check if the current route is not the login page -->
                <x-sidebar class="flex-1" />
            @endif
            <main class="flex-1 bg-white mx-auto mr-3 ml-80 mt-1 rounded-lg ">
                {{ $slot}}
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
            </main>
        </div>
    </div>
  @vite('resources/js/app.js')
</body>
</html>
