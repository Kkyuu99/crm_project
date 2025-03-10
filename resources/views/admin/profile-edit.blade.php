<x-layout>

    <h1 class="page-title">User Profile Edit</h1>
    <hr class="border-t-1 border-gray-300 my-4 w-full" />

    <form class="w-full mx-auto max-w-lg p-2" action="{{ route($prefix . '.profile-update', $user->id) }}" method="POST" enctype="multipart/form-data">
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

        <div class="justify-center p-2 text-center">

            <div class="flex gap-6 mb-6 items-center">
                <img id="profile_pic_preview" 
                src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('storage/images/default-profile.png') }}"
                alt="Profile picture" class="h-40 w-40 rounded-full border-2 border-gray-400 shadow-sm"/>

                <div class="flex flex-col">
                <label for="profile_pic" class="create-btn">Change Avatar</label>
                <input type="file" class="hidden" id="profile_pic" name="profile_pic" onchange="previewImage(event)">

                <div class="mt-2">
                    <input type="checkbox" id="remove_profile_pic" name="remove_profile_pic" value="1">
                    <label for="remove_profile_pic" class="text-sm text-red-500 font-semibold">Remove Profile </label>
                </div>
                </div>
                
            </div>

            <div class="mb-3">
                <input type="text" id="name" name="name" class="w-full px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" 
                placeholder="Name"
                value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-3">
                <input type="email" id="email" name="email" class="w-full px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" 
                placeholder="Email"
                value="{{ old('email', $user->email) }}">
            </div>

            <div class="text-left">
                <div class="flex justify-between items-center">
                    <a href="{{ route($prefix. '.change-password', $user->id) }}"
                        class="create-btn">
                            Change password
                    </a>

                    <div class="flex justify-end space-x-1">
                        <button type="submit" class="create-btn">
                            Save
                        </button>
                        <a href="{{ route($prefix . '.user-profile', $user->id) }}"
                            class="cancel-btn">
                            Cancel
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </form>
</x-layout>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const imagePreview = document.getElementById('profile_pic_preview');
            imagePreview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
