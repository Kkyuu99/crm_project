<x-layout>

    <h1 class="page-title">Change Password</h1>
    <hr class="border-t-1 border-gray-300 my-4 w-full" />
    
    <div class="w-full mb-5 max-w-2xl mx-auto p-6">
        <form method="POST" action="{{ route($prefix. '.change-password', $user->id) }}">
            @csrf

            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">Current Password</label>
                <input type="password" id="current_password" name="current_password" 
                    class="px-4 py-2 w-full border input-boxes focus:outline-none"
                    value="{{ old('current_password') }}" required>
                @error('current_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-semibold mb-2">New Password</label>
                <input type="password" id="new_password" name="password" 
                    class="px-4 py-2 w-full border input-boxes focus:outline-none"
                    value="{{ old('password') }}" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="password_confirmation" 
                    class="px-4 py-2 w-full border input-boxes focus:outline-none"
                    value="{{ old('password_confirmation') }}" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-1 mt-8">
                <button type="submit" class="create-btn">
                    Save
                </button>
                <a href="{{ route($prefix . '.user-profile', $user->id) }}"
                    class="cancel-btn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>