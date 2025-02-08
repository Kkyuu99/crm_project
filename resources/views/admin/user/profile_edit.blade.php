<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <form class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md" action="/update-profile" method="POST">
        <h1 class="text-xl font-bold text-left mb-4">Profile Edit</h1>
        <hr class="mb-6">
    
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 flex items-left text-xl">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
        </div>

        <div class="text-center mb-3">
            <button type="button" class=" px-1 py-1 bg-neutral-100 decoration-black font-medium rounded-lg shadow-md hover:bg-neutral-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Change Avatar
            </button><br>
        </div>
        <div class="text-center mb-3">
            <button type="button" class=" px-1 py-1  bg-neutral-100 decoration-black font-semibold rounded-lg shadow-md hover:bg-neutral-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Change Password
            </button>
        </div>

        <div class="mb-3">
            <input type="text" id="firstName" name="firstName" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="First Name">
        </div>

        <div class="mb-3">
            <input type="text" id="lastName" name="lastName" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Last Name">
        </div>

        <div class="mb-3">
            <input type="text" id="username" name="username" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="User Name">
        </div>

        <div class="mb-3">
            <input type="email" id="email" name="email" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Email">
        </div>

        <div class="mb-3">
            <input type="text" id="phone" name="phone" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Phone">
        </div>

        <div class="flex justify-end space-x-4">
            <button type="submit" class=" px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-400">
                Save
            </button>
            <button type="reset" class="px-4 py-2 bg-orange-600 text-white font-semibold rounded-lg shadow-md hover:bg-orange-500">
                Cancel
            </button>
        </div>
    </form>
</body>

</html>