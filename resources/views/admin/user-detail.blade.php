@php
    $prefix = Auth::user()->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <h1 class="text-2xl font-bold text-black my-4 text-center">User Detail Form</h1>
    <hr class="border-t-1 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-3xl mx-auto p-2">

            <div class="flex gap-4 items-center mb-4">
                <label for="user_id" class="block text-black text-sm text-right mb-2 w-16">User ID</label>
                <input
                required
                disabled
                type="text"
                id="user_id"
                name="user_id"
                value="{{ old('user_id', $user->id) }}"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex gap-4 items-center mb-4">
                <label for="name" class="block text-black text-sm text-right mb-2 w-16">Name</label>
                <input
                required
                disabled
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                placeholder="Enter Name"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 items-center mb-4">
                <label for="email" class="block text-black text-sm text-right mb-2 w-16">Email</label>
                <input
                required
                disabled
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                placeholder="Enter email"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 mb-4">
                <label for="project_id" class="block text-black text-sm text-right mt-2 mb-2 w-16">Project</label>
                <div class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @foreach($user->projects as $project)
                        <label class="block">
                            <input type="checkbox" name="projects[]" value="{{ $project->id }}" checked disabled>
                            {{ $project->id }} : {{ $project->project_name }}
                        </label>
                    @endforeach

                </div>
            </div>

            <div class="flex gap-4 items-center mb-4">
                <label for="role" class="block text-black text-sm text-right mb-2 w-16">Role</label>
                    <select id="role" disabled name="role" class="flex-1 px-4 py-2 rounded-lg border border-gray-300 bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    </select>
            </div>

            <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
                <a href="{{ route($prefix . '.user-list') }}"
                    class="bg-red-400 text-white px-6 py-2 rounded-md hover:bg-red-600 font-medium text-sm hover:text-white">
                    Back
                </a>
                <form action="{{ route($prefix . '.user-edit', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button
                    type="submit"
                    class="bg-purple-400 text-white px-6 py-2 rounded-md hover:bg-purple-700 font-medium text-sm hover:text-white">
                    Edit</button>
                </form>
            </div>
    </div>
</x-layout>
