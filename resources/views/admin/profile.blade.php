@php
    $user = Auth::user();
    $prefix = $user && $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    
        <h1 class="text-xl font-bold mb-4 px-5 py-5">User Profile</h1>
        <hr class="mb-6">
    
        <div class="flex gap-6 px-10">
            <div>
                <!-- <img src="{{ Auth::user()->profile_picture_url ?? 'path/to/default/profile.png' }}" alt="Profile Picture" class="h-30 w-30 rounded-full"> -->
                <img src="{{ Auth::user()->profile_picture_url ?? 'path/to/default/profile.png' }}" alt="Profile picture" class="h-30 w-30 rounded-full"/>
            </div>
            <div class="text-left">
                <div class="flex flex-col items-start space-y-1">
                    <h2 class="text-sm justify-center font-medium mb-2">{{ Auth::user()->name }}</h2>
                </div>
                <div class="flex flex-col items-start space-y-1">
                    <h3 class="text-sm justify-center font-medium mb-2">{{ Auth::user()->email }}</h3>
                </div>
                <div class="flex flex-col items-start space-y-1">
                <a href="{{ route($prefix. '.profile-edit', $user->id) }}">
                    <button type="submit" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-500 font-medium text-sm">
                            Edit profile
                    </button>
                </form>
                </div>
                <div class="flex flex-col items-start space-y-1">
                <a href="{{ }}">
                    <button type="submit" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-500 font-medium text-sm">
                            Change password
                    </button>
                </a>
                </div>
            </div>
        </div>
        
        
        <!-- <div class="mb-3 mt-5">
            <input type="text" id="firstName" name="firstName" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="First Name">
        </div>

        <div class="mb-3">
            <input type="text" id="lastName" name="lastName" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Last Name">
        </div>

        <div class="mb-3">
            <input type="text" id="phone" name="phone" class="w-full p-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Phone">
        </div> -->

</x-layout>