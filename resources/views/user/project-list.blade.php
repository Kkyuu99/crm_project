<x-layout>

@include('messages')
@include('filter-scripts')

    <div class="flex justify-between items-center">
        <h1 class="page-title">Project List</h1>

        <button id="filter-button" class="btn-2">
            Filter
        </button>
    </div>

    <div id="filter-form" class="absolute right-0 mt-2 bg-white shadow-lg p-4 rounded-md hidden w-40">
       <form action="{{ route($prefix. '.project-list') }}" method="GET">
       <div class="mb-2">
            <h3 class="text-sm font-medium">Project Types</h3>
            <div class="flex flex-wrap">
                @foreach ($projectTypes as $type)
                    <div class="mr-4">
                        <label>
                            <input type="checkbox" name="project_types[]" value="{{ $type }}" class="mr-2"
                                @if (request()->has('project_types') && in_array($type, request()->input('project_types'))) checked @endif>
                            {{ $type }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <h3 class="text-sm font-medium">Status</h3>
            <div class="flex flex-wrap">
                @foreach ($statuses as $status)
                    <div class="mr-4">
                        <label>
                            <input type="checkbox" name="statuses[]" value="{{ $status }}" class="mr-2"
                                @if (request()->has('statuses') && in_array($status, request()->input('statuses'))) checked @endif>
                            {{ $status }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end mt-2">
            <button type="submit" class="apply-filter">Apply Filter</button>
        </div>
        
        <a href="{{ route($prefix .'.project-list') }}" class="block text-center text-red-500 text-sm mt-2 hover:underline">
                    Remove All Filters
        </a>
    </form>
    </div>

    <hr class="border-t-1 border-gray-300 mb-4" />

    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 custom-table projects-table text-center">
            <thead>
                <tr class="bg-white text-blue-b">
                    <th class="custom-table-column border border-gray-300 text-md">No.</th>
                    <th class="custom-table-column border border-gray-300 text-md">Project Type</th>
                    <th class="custom-table-column border border-gray-300 text-md">Project Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Status</th>
                    <th class="custom-table-column border border-gray-300 text-md">Organization Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Name</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Email</th>
                    <th class="custom-table-column border border-gray-300 text-md">Contact Phone</th>

                    @if(Auth::user()->role === 'admin')
                    <th class="custom-table-column border border-gray-300 text-md">Action</th>
                    @endif
                </tr>
            </thead><tbody>
                @foreach ($projects as $project)
                  @php
                    $projectDetailRoute = route($prefix . '.project-detail', $project->id);
                  @endphp
                  <tr class="odd:bg-white even:bg-gray-100 odd:hover:bg-gray-100 even:hover:bg-gray-200 cursor-pointer" onclick="location.href='{{ $projectDetailRoute }}'">
                    <td class="custom-table-cell">{{ $loop->iteration + (($projects->currentPage() - 1) * $projects->perPage()) }}</td>
                    <td class="custom-table-cell">{{ $project->project_type }}</td>
                    <td class="custom-table-cell">{{ $project->project_name }}</td>
                    <td class="custom-table-cell {{ $project->status == 'Active' ? 'text-green-500' : 'text-red-500' }}">{{ $project->status }}</td>
                    <td class="custom-table-cell">{{ $project->organization_name }}</td>
                    <td class="custom-table-cell">{{ $project->contact_name }}</td>
                    <td class="custom-table-cell">{{ $project->contact_email }}</td>
                    <td class="custom-table-cell">{{ $project->contact_phone }}</td>

                    @if(Auth::user()->role === 'admin')
                    <td class="custom-table-cell">
                        <div class="flex">
                            <a href="{{ route($prefix . '.project-edit', $project->id) }}" class="btn btn-update">
                                    <button class="btn-edit">Edit</button>
                            </a>

                            <form action="{{ route($prefix . '.project-delete', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
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
        <button class="btn-2 mt-1 inline-block">
            Add New Project
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