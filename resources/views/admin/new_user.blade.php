<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <form class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md" action="/update-profile" method="POST">
        <h1 class="text-xl font-bold text-left mb-4">New User</h1>
        <hr class="mb-6">

        <div class="mb-3">
            <label class="font-regular text-slate-600 justify-start text-xl">Name</label>
            <input type="text" name="Name" class="w-full p-1 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-3">
            <label class="font-regular text-slate-600 justify-start text-xl">Password</label>
            <input type="text" name="Password" class="w-full p-1 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-3">
            <label class="font-regular text-slate-600 justify-start text-xl">Project Name</label>
            <input type="text" name="Project Name" class="w-full p-1 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-3">
            <label class="font-regular text-slate-600 justify-start text-xl">Role & Responsibility</label>
            <SELECT class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">

                <OPTION Value="Admin">Admin</OPTION>
                <OPTION Value="User">User</OPTION>
                </SELECT>
        </div>

        <div class="mb-3">
            <label class="block font-regular text-slate-600 text-xl mb-1">Created Date</label>
            <div class="relative w-full max-w-xs">
              <input 
                type="date" 
                class="w-full  bg-neutral-100 border border-gray-300 rounded-lg px-4 py-2 pr-10">
            </div>
        </div>
          
                <div class="mb-3">
                    <label class="font-regular text-slate-600 justify-start text-xl">Status</label>
                    <SELECT class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">
        
                        <OPTION Value="Pending">Pending</OPTION>
                        <OPTION Value="Open">Open</OPTION>
                        <OPTION Value="Closed">Closed</OPTION>
                        <OPTION Value="Resolved">Resolved</OPTION>
                        </SELECT>
                </div>
              

        <div class="flex justify-center space-x-4">
            <button type="submit" class=" px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-400">
                Update
            </button>
            <button type="reset" class="px-4 py-2 bg-orange-600 text-white font-semibold rounded-lg shadow-md hover:bg-orange-500">
                Cancel
            </button>
        </div>
    </form>
</body>

</html>