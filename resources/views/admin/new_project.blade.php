<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <form class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md" action="/update-profile" method="POST">
        <h1 class="text-xl font-bold text-left mb-4">New Project</h1>
        <hr class="mb-6">

        <div class="mb-3">
            <label class="font-regular text-black justify-start text-sm">Name</label>
            <input type="text" id="firstName" name="firstName" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-3">
            <label class="font-regular text-black justify-start text-sm">Organization Name</label>
            <input type="text" id="lastName" name="lastName" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="flex gap-8">
        <div class="mb-3 ">
            <label class="font-regular text-black justify-start text-sm">Project Type</label>
            <SELECT class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">

                <OPTION Value="Pending">Pending</OPTION>
                <OPTION Value="Open">Open</OPTION>
                <OPTION Value="Closed">Closed</OPTION>
                <OPTION Value="Resolved">Resolved</OPTION>
                </SELECT>
        </div>

        <div class="mb-3 w-1/2">
            <label class="font-regular text-black justify-start text-sm">Project Manager/Account Manager</label>
            <input type="text" id="lastName" name="lastName" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-3">
            <label class="font-regular text-black justify-start text-sm">Contact Name</label>
            <input type="email" id="email" name="email" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-3 w-1/2">
            <label class="block font-regular text-black text-sm mb-1">Created Date</label>
            <div">
              <input 
                type="date" 
                class="  bg-neutral-100 border border-gray-300 rounded-lg px-1 py-1">
            </div>
        </div>    

        <div class="flex gap-8">
        <div class="mb-3">
            <label class="font-regular text-black justify-start text-sm">Contact Phone</label>
            <input type="text" id="phone" name="phone" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="+959-000000000">
        </div>

        <div class="mb-3 w-1/2">
            <label class="font-regular text-black justify-start text-sm">Status</label>
            <SELECT class="w-full p-0.5 text-black text-sm bg-sky-300 border border-gray-300 rounded-lg shadow-sm">

                <OPTION Value="Pending">active</OPTION>
                <OPTION Value="Open">Open</OPTION>
                <OPTION Value="Closed">Closed</OPTION>
                <OPTION Value="Resolved">Resolved</OPTION>
                </SELECT>
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-3">
            <label class="font-regular text-black justify-start text-sm">Contact Email</label>
            <input type="text" id="phone" name="phone" class="w-full p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample@gmail.comm">
        </div>

            <button type="create" class="w-full p-0 bg-violet-500 text-white text-sm font-regular rounded-lg shadow-sm hover:bg-violet-400">
                Create
            </button>
        </div>   
    </form>
</body>

</html>