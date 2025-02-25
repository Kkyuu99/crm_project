@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <h1 class="text-2xl font-bold text-black my-4 text-center">User Register Form</h1>
    <hr class="border-t-1 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-3xl mx-auto p-2">
        <form action="{{ route($prefix . '.user-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="text-red-500 text-sm mt-2 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="flex gap-4 items-center mb-4">
                <label for="name" class="block text-black text-sm text-right mb-2 w-16">Name</label>
                <input
                required
                type="text"
                id="name"
                name="name"
                placeholder="Enter Name"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 items-center mb-4">
                <label for="email" class="block text-black text-sm text-right mb-2 w-16">Email</label>
                <input
                required
                type="email"
                id="email"
                name="email"
                placeholder="Enter email"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 items-center mb-4">
                <label for="password" class="block text-black text-sm text-right mb-2 w-16">Password</label>
                <input
                required
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 items-center mb-4">
                <label for="password_confirmation" class="block text-black text-sm text-right mb-2 w-16">Confirm Password</label>
                <input
                required
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm password"
                class="flex-1 px-4 py-2 rounded-lg border border-gray-300 bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-4 mb-4">
                <label for="project_id" class="block text-black text-sm text-right mt-2 mb-2 w-16">Project</label>
                <div class="flex-1 px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach($projects as $project)
                        <label class="block">
                            <input type="checkbox" name="projects[]" value="{{ $project->id }}">
                            {{ $project->id }} : {{ $project->project_name }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
<<<<<<< HEAD

=======

>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
            <div class="flex gap-4 items-center mb-4">
                <label for="role" class="block text-black text-sm text-right mb-2 w-16">Role</label>
                    <select id="role" name="role" class="flex-1 px-4 py-2 rounded-lg border border-gray-300 bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
            </div>

            <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
                <a href="{{ route($prefix. '.user-list') }}"
                    class="bg-red-400 text-white px-6 py-2 rounded-md hover:bg-red-600 font-medium text-sm hover:text-white">
                    Cancel
                </a>
                <button
                   type="submit"
                   class="bg-purple-400 text-white px-6 py-2 rounded-md hover:bg-purple-700 font-medium text-sm hover:text-white">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-layout>
