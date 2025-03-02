@php
    $user = Auth::user();
    $prefix = $user && $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    
    @if(session('success'))
        <div id="success-message" class="popup-message bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div id="error-message" class="popup-message bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
    
    <h1 class="text-2xl font-bold text-black my-4 text-center">User Profile</h1>
    <hr class="border-t-1 border-gray-300 my-4 w-full" />

    <div class="flex justify-center p-2 items-center mb-6 space-x-6">

        <div class="flex items-center">
            <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/images/default-profile.png') }}"
            alt="Profile picture" class="h-40 w-40 rounded-full border-2 border-black shadow-sm"/>
        </div>

        <div class="flex flex-col justify-between items-start pl-4">
            <div class="flex flex-col mb-3">
                    <a href="{{ route($prefix. '.profile-edit', $user->id) }}">
                        <button type="submit" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-600 font-medium text-sm w-32">
                                Edit profile
                        </button>
                    </a>
            </div>

            <div class="flex flex-col">
                <a href="">
                    <button type="submit" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-600 font-medium text-sm w-32">
                            Change password
                    </button>
                </a>
            </div>

        </div>    
    </div>

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">ID</label>
            <input type="text" id="user-name" name="user_id"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->id }}" disabled>
        </div> 

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Name</label>
            <input type="text" id="user-name" name="user_name"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->name }}" disabled>
        </div>

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Email</label>
            <input type="text" id="user-email" name="user_email"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->email }}" disabled>
        </div>

</x-layout>

<script>
        window.onload = function() {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            if (successMessage) {
                
                setTimeout(function() {
                    successMessage.classList.add('show');
                }, 100);

                setTimeout(function() {
                    successMessage.classList.add('hidden');
                }, 3000);
            }

            if (errorMessage) {

                setTimeout(function() {
                    errorMessage.classList.add('show');
                }, 100);
                
                setTimeout(function() {
                    successMessage.classList.add('hidden');
                }, 3000);
            }
        };
</script>