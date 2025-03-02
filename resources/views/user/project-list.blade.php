<x-layout>

    @if(session('success'))
        <div id="success-message" class="popup-message bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div id="error-message" class="popup-message bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold my-4 text-center ml-4">Project Lists</h1>
    <hr class="border-t-1 border-gray-300 my-4" />

    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 custom-table projects-table text-center">
            <thead>
                <tr class="bg-white text-blue-b">
                    <th class="custom-table-column border border-gray-300 text-md">No.</th>
                    <th class="custom-table-column border border-gray-300 text-md">Project ID</th>
                    <th class="custom-table-column border border-gray-300 text-md">Project Type</th>
                    <th class="custom-table-column border border-gray-300 text-md">Project Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Status</th>
                    <th class="custom-table-column border border-gray-300 text-md">Organization Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Email</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Phone</th>
                    <th class="custom-table-column border border-gray-300 text-md">Created Date</th>

                    @if(Auth::user()->role === 'admin')
                    <th class="custom-table-column border border-gray-300 text-md">Action</th>
                    @endif
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
                    <td class="custom-table-cell">{{ $loop->iteration + (($projects->currentPage() - 1) * $projects->perPage()) }}</td>
                    <td class="custom-table-cell">{{ $project->id }}</td>
                    <td class="custom-table-cell">{{ $project->project_type }}</td>
                    <td class="custom-table-cell">{{ $project->project_name }}</td>
                    <td class="custom-table-cell {{ $project->status == 'Active' ? 'text-green-500' : 'text-red-500' }}">{{ $project->status }}</td>
                    <td class="custom-table-cell">{{ $project->organization_name }}</td>
                    <td class="custom-table-cell">{{ $project->contact_name }}</td>
                    <td class="custom-table-cell">{{ $project->contact_email }}</td>
                    <td class="custom-table-cell">{{ $project->contact_phone }}</td>
                    <td class="custom-table-cell">{{ $project->created_at }}</td>

                    @if(Auth::user()->role === 'admin')
                    <td class="custom-table-cell">
                        <div class="flex">
                            <a href="{{ route($prefix . '.project-edit', $project->id) }}" class="btn btn-update">
                                    <button class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">Edit</button>
                            </a>

                            <form action="{{ route($prefix . '.project-delete', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
                            </form>
                        </div>    
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(Auth::user()->role === 'admin')
    <a href="{{ route('admin.project-create') }}">
        <button class="flex items-center justify-start text-white bg-violet-400 px-6 py-2 rounded-lg hover:bg-violet-500 font-medium text-sm mx-5">
            Add New
        </button>
    </a>
    @endif

    <div class="my-4 flex justify-center">
        <div class="bg-white rounded-lg px-6 py-4">
            <ul class="space-x-2">
                {{ $projects->links() }}
            </ul>
        </div>
    </div>
</x-layout>

<script>
        window.onload = function() {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            if (successMessage) {
                
                setTimeout(function() {
                    successMessage.classList.add('show');
                }, 100);

                setTimeout(function() {
                    successMessage.classList.add('hidden');
                }, 3000);
            }

            if (errorMessage) {

                setTimeout(function() {
                    errorMessage.classList.add('show');
                }, 100);
                
                setTimeout(function() {
                    successMessage.classList.add('hidden');
                }, 3000);
            }
        };
</script>