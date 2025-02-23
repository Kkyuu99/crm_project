<x-layout>
    <h1 class="text-xl font-bold my-4 text-left ml-4">Project Lists</h1>
    <hr class="mb-6">

    <!-- Table Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
            <thead>
                <tr class="bg-white font-normal text-xs text-blue-800">
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project-id</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Type</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Name</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Organization Name</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Contact Name</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Contact Email</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Contact Phone</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Created Date</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Status</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->id }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->project_type }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">
                        <!-- Link to project details page -->
                        <a href="{{ route('user.project-detail', $project->id) }}" class="text-blue-600 hover:text-blue-400">
                            {{ $project->project_name }}
                        </a>
                    </td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->organization_name }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_name }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_email }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_phone }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->created_at }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl {{ $project->status == 'Active' ? 'text-green-500' : 'text-red-500' }}">
                        {{ $project->status }}
                    </td>
                    <td class="flex justify-between items-center">
                        
                        <!-- Delete Button -->
                        <form action="{{ route('user.project-delete', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
                        </form>


                        <!-- Conditional Update or Edit Button -->
                        @if($project->status == 'Active')
                            <!-- Update Button for Active Projects -->
                            <a href="{{ route('user.project_edit', $project->id) }}" class="btn btn-update">
                                <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Update</button>
                            </a>
                        @else
                            <!-- Edit Button for Inactive Projects -->
                            <a href="{{ route('user.project_edit', $project->id) }}" class="btn btn-update">
                                <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Edit</button>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="/user/new_project">
        <button class="flex items-center justify-start bg-purple-500 px-6 py-3 rounded-md hover:bg-purple-500 font-medium text-sm mx-2">
            Add New
        </button>
    </a>

    <div class="my-4 flex justify-center">
        <div class="bg-white shadow-md rounded-lg px-6 py-4">
            <ul class="space-x-2">
                {{ $projects->links() }}
            </ul>
        </div>
    </div>
</x-layout>
