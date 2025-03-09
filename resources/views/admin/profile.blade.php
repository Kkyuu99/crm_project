<x-layout>
    
@include('messages')
    
    <h1 class="text-2xl font-bold text-black my-4 text-center">User Profile</h1>
    <hr class="border-t-1 border-gray-300 my-4 w-full" />

    <div class="flex justify-center p-2 items-center mb-6 space-x-6">

        <div class="flex items-center">
            <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/images/default-profile.png') }}"
            alt="Profile picture" class="h-40 w-40 rounded-full border-2 border-gray-400 shadow-sm"/>
        </div>

        <div class="flex flex-col justify-between items-start pl-4">
            <div class="flex flex-col mb-3">
                    <a href="{{ route($prefix. '.profile-edit', $user->id) }}">
                        <button type="submit" class="create-btn">
                                Edit profile
                        </button>
                    </a>
            </div>

            <div class="flex flex-col">
                <a href="{{ route($prefix. '.change-password', $user->id) }}">
                    <button type="submit" class="create-btn">
                            Change password
                    </button>
                </a>
            </div>

        </div>    
    </div>

        <div class="flex mb-4 space-x-6 w-3/4 mx-auto items-center">
            <label class="text-gray-700 w-36 text-right">ID</label>
            <input type="text" id="user-name" name="user_id"  class="flex-1 w-64 px-4 py-2 text-slate-600 border input-boxes" value="{{ Auth::user()->id }}" disabled>
        </div> 

        <div class="flex mb-4 space-x-6 w-3/4 mx-auto items-center">
            <label class="text-gray-700 w-36 text-right">Name</label>
            <input type="text" id="user-name" name="user_name"  class="flex-1 w-64 px-4 py-2 text-slate-600 border input-boxes" value="{{ Auth::user()->name }}" disabled>
        </div>

        <div class="flex mb-4 space-x-6 w-3/4 mx-auto items-center">
            <label class="text-gray-700 w-36 text-right">Email</label>
            <input type="text" id="user-email" name="user_email"  class="flex-1 w-64 px-4 py-2 text-slate-600 border input-boxes" value="{{ Auth::user()->email }}" disabled>
        </div>

</x-layout>