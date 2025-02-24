<x-layout>
<<<<<<< HEAD
    <h1 class="text-xl text-blue-500 font-bold my-4 text-left ml-4">Project Lists</h1>
=======
    <h1 class="text-xl font-bold my-4 text-left ml-4">Project Lists</h1>
    <hr class="mb-6">

>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
    <!-- Table Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
            <thead>
<<<<<<< HEAD
                <tr class="bg-white text-blue">
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project id</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Name</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Type</th>
=======
                <tr class="bg-white font-normal text-xs text-blue-800">
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project-id</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Type</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Name</th>
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
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
<<<<<<< HEAD
                @foreach ($projects as $project)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->id}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->project_name}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->project_type}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->organization_name}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->contact_name}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->contact_phone}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->contact_email}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{$project->created_at}}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl text-green-500">Open</td>
                    <td class="flex justify-between items-center">
                        <form action="/project/{{$project->project_name}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                            type="submit"
                            class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
                        </form>
                        <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Update</button>
                    </td>
                </tr>
                @endforeach
        
            </tbody>
        </table>
    </div>

    
    <div class="my-4 flex justify-center">
        <div class="bg-white shadow-md rounded-lg px-6 py-4">
            <ul class="space-x-2">
                {{ $projects->links() }}
            </ul>
        </div>
    </div>
    {{-- <div class="flex items-center justify-end bg-gray-100 p-2 rounded-md w-fit ml-auto">
        <!-- Left Arrow -->
        <button
          class="arr left bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
          aria-label="Previous"
          title="Previous">
          <span>&lt;</span>
        </button>
=======
            @foreach ($projects as $project)
              @php
                $user = Auth::user();
                $prefix = $user->role === 'admin' ? 'admin' : 'user';
                $projectDetailRoute = route($prefix . '.project-detail', $project->id);
              @endphp
                <tr class="hover:bg-gray-100" onclick="location.href='{{ $projectDetailRoute }}'">
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->id }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->project_type }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->project_name }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->organization_name }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_name }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_email }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->contact_phone }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl">{{ $project->created_at }}</td>
                    <td class="border border-gray-300 px-8 py-3 text-xl {{ $project->status == 'Active' ? 'text-green-500' : 'text-red-500' }}">
                        {{ $project->status }}
                    </td>
                    <td class="flex justify-between items-center">

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
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26

    <a href="{{ route($prefix . '.project-create') }}">
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
<<<<<<< HEAD

        <!-- Right Arrow -->
        <button
          class="arr right bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
          aria-label="Next"
          title="Next">
          <span>&gt;</span>
        </button>
      </div>


    </div> --}}
</x-layout>
=======
    </div>
</x-layout>
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
