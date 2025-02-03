<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-neutral-50 font-[Poppins]">
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
            <i class="bi bi-filter-left px-4 bg-gray-900
            rounded-md"></i>
        </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[300px] overflow-auto 
    text-center bg-purple-500">
        
        <div class="text-gray-100 text-xl">
            <div class="p-2 mt-1 flex items-center">
                <i class="bi bi-person-circle px-2 py-1 text-gray-100 rounded-md"></i>
                <h1 class="font-bold text-gray-200 text-[25px] ml-3">Username</h1>
                <i class="bi bi-x ml-20 cursor-pointer" onclick="Open()"></i>
            </div>
            <hr class="my-2 text-gray-600">
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer bg-gray-600 text-white">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="Search" class="text-[15px] ml-4 w-full
            bg-transparent focus:outline-none">
    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer hover:bg-gray-700">
        <i class="bi bi-clipboard-pulse"></i>
        <span class="text-[15px] ml-4 text-purple-300">Dashboard</span>
    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer hover:bg-gray-700" onclick="dropdown(project)">
        <i class="bi bi-clipboard-pulse"></i>
        <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-purple-300">Project</span>
            <span class="text-sm rotate-180" id="arrow">
             <i class="bi bi-chevron-up"></i>
            </span>
        </div>
    </div>

    <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200" id="submenu-issues">
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Project List</h1>
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New Project</h1>
    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer hover:bg-gray-700" onclick="dropdown(issues)">
        <i class="bi bi-clipboard-pulse"></i>
        <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-purple-300">Issues</span>
            <span class="text-sm rotate-180" id="arrow">
             <i class="bi bi-chevron-up"></i>   
            </span>
        </div>
    </div>

    <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200" id="submenu-issues">
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue List</h1>
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue Detail</h1>
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New Issue</h1>
    </div>

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer hover:bg-gray-700" onclick="dropdown(users)">
        <i class="bi bi-person"></i>
        <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200">Users</span>
            <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-up"></i>   
            </span>
        </div>
    </div>

    <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200" id="submenu-user">
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">User List</h1>
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">User Edit</h1>
        <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New User</h1>
    </div>
    <hr class="my-2 text-gray-600">

    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer hover:bg-gray-700 text-">
        <i class="bi bi-box-arrow-left"></i>
        <span class="text-[15px] ml-4 text-purple-300">Logout</span>
    </div>

    </div>

    <script type="text/javascript">
        function dropdown(project){
            document.querySelector('#submenu-project').classList.toggle('hidden');
            document.querySelector('#arrow').classList.toggle('rotate.0');
        } 
        dropdown()
        function Open(){
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }
    </script>
</body>
</html>