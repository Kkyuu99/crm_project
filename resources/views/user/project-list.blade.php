<x-layout>
    <h1 class="text-2xl font-bold my-4 text-center ml-4">Project Lists</h1>
    <hr class="border-t-1 border-gray-300 my-4" />

    <!-- Table Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[2500px] text-center">
            <thead>
                <tr class="bg-white text-blue-b">
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">No.</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Project-id</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Project Type</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Project Name</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Status</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Organization Name</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Contact Name</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Contact Email</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Contact Phone</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Created Date</th>
                    <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
              @php
                $user = Auth::user();
                $prefix = $user->role === 'admin' ? 'admin' : 'user';
                $projectDetailRoute = route($prefix . '.project-detail', $project->id);
              @endphp
                <tr class="hover:bg-gray-100 cursor-pointer" onclick="location.href='{{ $projectDetailRoute }}'">
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $loop->iteration + (($projects->currentPage() - 1) * $projects->perPage()) }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->id }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->project_type }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->project_name }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md {{ $project->status == 'Active' ? 'text-green-500' : 'text-red-500' }}">
                        {{ $project->status }}
                    </td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->organization_name }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->contact_name }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->contact_email }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->contact_phone }}</td>
                    <td class="border border-gray-300 px-8 py-2 text-md">{{ $project->created_at }}</td>
                    <td class="flex justify-center px-4 py-7">

                        <!-- Conditional Update or Edit Button -->
                        @if($project->status == 'Active')
                            <!-- Update Button for Active Projects -->
                            <a href="{{ route($prefix . '.project-edit', $project->id) }}" class="btn btn-update">
                                <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Update</button>
                            </a>
                        @else
                            <!-- Edit Button for Inactive Projects -->
                            <a href="{{ route($prefix . '.project-edit', $project->id) }}" class="btn btn-update">
                                <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Edit</button>
                            </a>
                        @endif

                        <!-- Delete Button -->
                        <form action="{{ route($prefix . '.project-delete', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route($prefix . '.project-create') }}">
        <button class="flex items-center justify-start text-white bg-violet-400 px-6 py-2 rounded-lg hover:bg-violet-500 font-medium text-sm mx-5">
            Add New
        </button>
    </a>

    <div class="my-4 flex justify-center">
        <div class="bg-white rounded-lg px-6 py-4">
            <ul class="space-x-2">
                {{ $projects->links() }}
            </ul>
        </div>
    </div>
</x-layout>