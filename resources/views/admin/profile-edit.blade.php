        @csrf
        @method('PUT')
        @if ($errors->any())
                <div class="text-red-500 text-sm mt-2 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

<x-layout>            
        <h1 class="text-xl font-bold mb-4 px-5 py-5 text-center">Profile Edit</h1>
        <hr class="mb-6">
  
        <!-- Action Buttons -->
        <div class="justify-center p-2 text-center">
         <div class="mb-6 px-10 w-full flex justify-center items-center">
            <!-- <img src="{{ Auth::user()->profile_picture_url ?? 'path/to/default/profile.png' }}" alt="Profile picture" class="h-40 w-40 rounded-full justify-center"/> -->
            <img src="{{ Auth::user()->profile_picture_url ?? asset('images/default-profile.png') }}" alt="Profile picture" class="h-40 w-40 rounded-full border-2 border-black shadow-sm"/>
        </div>

        <!-- Change Avator Button-->
        <div class="mt-3 px-5 mb-4">
                
                    <button type="button" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-600 font-medium text-sm">
                            Change avatar
                    </button>
                </a>
                </div>
        </div>

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">ID</label>
            <input type="text" id="user-name" name="user_id"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->id }}">
        </div>

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Name</label>
            <input type="text" id="user-name" name="user_name"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->name }}">
        </div>

        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Email</label>
            <input type="text" id="user-email" name="user_email"  class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ Auth::user()->email }}">
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3">
        
        <!-- Save Button -->
        <div class="mt-4 px-5">
               
                    <button type="submit" class="justify-center text-white bg-violet-400 px-4 py-1 rounded-lg hover:bg-violet-600 font-medium text-sm">
                            Save
                    </button>
                </a>
                </div>
        <!-- Cancel Button -->
                <div class="mt-4 mb-4">
                
                    <button type="submit" class="justify-center text-white bg-orange-400 px-4 py-1 rounded-lg hover:bg-orange-600 font-medium text-sm">
                            Cancel
                    </button>
                </a>
                </div>
        </div>
</x-layout>