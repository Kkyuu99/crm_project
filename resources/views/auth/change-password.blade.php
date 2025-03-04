@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>

    <h1 class="text-2xl font-bold text-black my-4 text-center">Change Password</h1>
    <hr class="border-t-1 border-gray-300 my-4 w-full" />
    
    <div class="w-full mb-5 max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <form method="POST" action="{{ route($prefix. '.change-password', $user->id) }}">
            @csrf

            <div class="mb-6">
                <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">Current Password</label>
                <input type="password" id="current_password" name="current_password" 
                    class="px-4 py-3 w-full rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('current_password') }}" required>
                @error('current_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password" class="block text-gray-700 text-sm font-semibold mb-2">New Password</label>
                <input type="password" id="new_password" name="password" 
                    class="px-4 py-3 w-full rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('password') }}" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="password_confirmation" 
                    class="px-4 py-3 w-full rounded-lg border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('password_confirmation') }}" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <button type="submit" class="bg-violet-400 text-white px-6 py-2 rounded-md hover:bg-violet-600 font-medium text-sm hover:text-white">
                    Save
                </button>
                <a href="{{ route($prefix . '.user-profile', $user->id) }}"
                    class="bg-red-400 text-white px-6 py-2 rounded-md hover:bg-red-600 font-medium text-sm hover:text-white">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>