<x-layout>
    <h1 class="text-xl text-blue-500 font-bold my-4 text-left ml-4">Project Lists</h1>
    <!-- Table Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
            <thead>
                <tr class="bg-white text-blue">
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project id</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Name</th>
                    <th class="border border-gray-300 px-19 py-3 text-lg truncate">Project Type</th>
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

        <!-- Center Label -->
        <div
          class="bg-soft-purple text-white px-6 py-1 rounded-md font-medium text-sm mx-2">
          1
        </div>

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
