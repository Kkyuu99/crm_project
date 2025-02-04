<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
    <i class="bi bi-filter-left px-4 bg-gray-900 rounded-md"></i>
</span>

<!-- Sidebar -->
<div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[300px] overflow-auto text-center bg-purple-500">
    <div class="text-gray-100 text-xl">
        <div class="p-2 mt-1 flex items-center">
            <i class="bi bi-person-circle px-2 py-1 text-black rounded-md"></i>
            <h1 class="font-bold text-gray-200 text-[25px] ml-3">Username</h1>
            <i class="bi bi-x ml-20 cursor-pointer" onclick="Open()"></i>
        </div>
    
        <!-- Sidebar Items -->
        <a href="/user/dashboard"">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700">
                <i class="bi bi-clipboard-pulse"></i>
                <span class="text-[15px] ml-4 text-purple-300">Dashboard</span>
            </div>
        </a>
    
        <!-- Dropdown for Project -->
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700" 
        onclick="dropdown('projects')">
            <i class="bi bi-clipboard-pulse"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-purple-300">Project</span>
                <span class="text-sm" id="arrow-projects">
                    <i class="bi bi-chevron-up"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu-projects">
            <a href="/user/project-list"">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Project List</h1>
            </a>
            <a href="#" onclick="loadContent('projectdetail.html')">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Project Detail</h1>
            </a>
        </div>
    
        <!-- Dropdown for Issues -->
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700" onclick="dropdown('issues')">
            <i class="bi bi-clipboard-pulse"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-purple-300">Issues</span>
                <span class="text-sm" id="arrow-issues">
                    <i class="bi bi-chevron-up"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu-issues">
            <a href="user/issue_list"">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue List</h1>
            </a>
            <a href="/user/issue-detail"">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue Detail</h1>
            </a>
            <a href="#" onclick="loadContent('new_issue.html')">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New Issue</h1>
            </a>
        </div>
    
        <!-- Dropdown for Users -->
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700" onclick="dropdown('users')">
            <i class="bi bi-person"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-purple-300">Users</span>
                <span class="text-sm" id="arrow-users">
                    <i class="bi bi-chevron-up"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu-users">
            <a href="#" onclick="loadContent('user-list.html')">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">User List</h1>
            </a>
            <a href="#" onclick="loadContent('user-edit.html')">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">User Edit</h1>
            </a>
            <a href="#" onclick="loadContent('new-user.html')">
                <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New User</h1>
            </a>
        </div>
    
        <hr class="my-2 text-gray-600">
    
        <!-- Logout Button -->
        <form action="/user/logout" method="POST"
        class=" mt-3 flex items-center rounded-md duration-300 cursor-pointer hover:bg-gray-700"
        >
            @csrf
            <button type="submit">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="text-[15px] ml-4 text-purple-300">Logout</span>
                </div>
            </button>
        </form>
        <a href="/user/login">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-700">
                <i class="bi bi-box-arrow-left"></i>
                <span class="text-[15px] ml-4 text-purple-300">Login</span>
            </div>
        </a>
    </div>
