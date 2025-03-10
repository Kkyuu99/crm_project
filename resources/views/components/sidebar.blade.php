@php
    $user = Auth::user();
    $prefix = $user && $user->role === 'admin' ? 'admin' : 'user';
@endphp

@if (Auth::check())  

@section('content')
<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
    <i class="bi bi-filter-left px-4 bg-gray-900 rounded-md"></i>
</span>

<!-- Sidebar -->
<div class="sidebar fixed flex flex-col justify-between top-0 bottom-0 lg:left-0 p-2 w-64 overflow-auto text-center bg-violet-500 ">
    <div class="text-gray-100 text-xl mb-3">
        <div class="p-2 mt-1 flex items-center">
        <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/images/default-profile.png') }}"
        alt="Profile Picture" class="h-10 w-10 rounded-full border-2 border-white">
        <a href="{{ route($prefix . '.user-profile', $user->id) }}" class="font-bold text-white-200 text-base ml-3">
            {{ Auth::user()->name }}
        </a>
            <i class="bi bi-x ml-20 cursor-pointer" onclick="Open()"></i>
        </div>
        <hr class="my-2 text-gray-600">
    </div>

    <!-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300
        cursor-pointer bg-[#FFFFFF] text-white">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="Search" class="text-[15px] ml-4 w-full
            bg-transparent focus:outline-none">
    </div> -->

    <!-- Sidebar Items -->
    <a href="{{ route($prefix . '.dashboard') }}"
        class="{{ request()->routeIs($prefix . '.dashboard') ? 'bg-violet-50 text-violet-600' : 'text-white' }} group flex items-center px-3 py-2 rounded-md hover:bg-violet-50 hover:text-violet-600 transition-colors mb-3">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
         </a>

    <!-- Dropdown for Project -->
    <a href="{{ route($prefix . '.project-list') }}"
        class="{{ request()->routeIs($prefix . '.project-list') ? 'bg-violet-50 text-violet-600' : 'text-white' }} group flex items-center px-3 py-2 rounded-md hover:bg-violet-50 hover:text-violet-600 transition-colors mb-3">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Projects
    </a>
    <!-- <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu-projects">
        <a href="/user/project-list">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Project List</h1>
        </a>
        <a href="#" onclick="loadContent('projectdetail.html')">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Project Detail</h1>
        </a>
    </div> -->

    <!-- Dropdown for Issues -->
    <a href="{{ route($prefix . '.issue-list') }}"
        class="{{ request()->routeIs($prefix . '.issue-list') ? 'bg-violet-50 text-violet-600' : 'text-white' }} group flex items-center px-3 py-2 rounded-md hover:bg-violet-50 hover:text-violet-600 transition-colors mb-3">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Issues
    </a>
    <!-- <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu-issues">
        <a href="user/issue_list">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue List</h1>
        </a>
        <a href="/user/issue-detail">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Issue Detail</h1>
        </a>
        <a href="#" onclick="loadContent('new_issue.html')">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">New Issue</h1>
        </a>
    </div> -->

    <!-- Dropdown for Users -->
    @if ($user->role === 'admin')
    <a href="{{ route('admin.user-list') }}"
        class="{{ request()->routeIs($prefix . '.user-list') ? 'bg-violet-50 text-violet-600' : 'text-white' }} group flex items-center px-3 py-2 rounded-md hover:bg-violet-50 hover:text-violet-600 transition-colors mb-3">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Users
         </a>
    @endif
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

    <hr class="my-2 text-gray-600 mt-auto">

    <!-- Logout Button -->
    <!-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-white-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-[15px] ml-4 text-white">Logout</button>
        </form>
    </div> -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="text-white group flex items-center px-3 py-2 rounded-md hover:bg-violet-50 hover:text-violet-600 transition-colors">
        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7"  />
        </svg>
            Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    
</div>
@endif