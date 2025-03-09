<x-layout>

@include('messages')
@include('filter-scripts')

  <div class="flex justify-between items-center">
        <h1 class="page-title">Issue List</h1>

        <button id="filter-button" class="btn-2">
            Filter
        </button>
    </div>

    <div id="filter-form" class="absolute right-0 mt-2 bg-white shadow-lg p-4 rounded-md hidden w-40">
       <form action="{{ route($prefix. '.issue-list') }}" method="GET">
       <div class="mb-2">
            <h3 class="text-sm font-medium">Priority</h3>
            <div class="flex flex-wrap">
                @foreach ($priorities as $priority)
                    <div class="mr-4">
                        <label>
                            <input type="checkbox" name="priorities[]" value="{{ $priority }}" class="mr-2"
                                @if (request()->has('priorities') && in_array($priority, request()->input('priorities'))) checked @endif>
                            {{ $priority }}
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
        
        <a href="{{ route($prefix .'.issue-list') }}" class="block text-center text-red-500 text-sm mt-2 hover:underline">
          Remove All Filters
        </a>
    </form>
  </div>
  
  <hr class="border-t-1 border-gray-300 mb-4" />
  
  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 custom-table issues-table text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="custom-table-column border border-gray-300 text-md">No.</th>
          <th class="custom-table-column border border-gray-300 text-md">Subject</th>
          <th class="custom-table-column border border-gray-300 text-md">Description</th>
          <th class="custom-table-column border border-gray-300 text-md">Project Name</th>
          <th class="custom-table-column border border-gray-300 text-md">Priority</th>
          <th class="custom-table-column border border-gray-300 text-md">Status</th>
          <th class="custom-table-column border border-gray-300 text-md">Attachment</th>
          <th class="custom-table-column border border-gray-300 text-md">Due date</th>
          <th class="custom-table-column border border-gray-300 text-md">Assignor</th>
          <th class="custom-table-column border border-gray-300 text-md">Duration</th>
          <th class="custom-table-column border border-gray-300 text-md">Solution</th>
          <th class="custom-table-column border border-gray-300 text-md">Remark</th>
          <th class="custom-table-column border border-gray-300 text-md">Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($issues as $issue)
      @php
        $issueDetailRoute = route($prefix . '.issue-detail', $issue->id);
      @endphp
      <tr class="odd:bg-white even:bg-gray-100 odd:hover:bg-gray-100 even:hover:bg-gray-200 cursor-pointer" onclick="location.href='{{ $issueDetailRoute }}'">
        <td class="custom-table-cell text-md">{{ $loop->iteration + (($issues->currentPage() - 1) * $issues->perPage()) }}</td>
        <td class="custom-table-cell text-md">{{$issue->subject}}</td>
        <td class="custom-table-cell text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="description" data-full-text="{{ $issue->description }}">
              <span class="short-text">{{ Str::limit($issue->description, 60) }}</span>
              <span class="full-text hidden">{{ $issue->description }}</span>
            </div>
        </td>
        <td class="custom-table-cell text-md">
          @if($issue->project)
            {{ $issue->project->project_name }}
          @endif
        </td>
        <td class="custom-table-cell text-md">{{$issue->priority}}</td>
        <td class="custom-table-cell text-md">{{$issue->issue_status}}</td>
        <td class="custom-table-cell text-md">       
            @if ($issue->attachment)
              <a href="{{ asset('storage/' . $issue->attachment) }}" target="_blank" class="text-blue-500 underline" onclick="event.stopPropagation();">
              View Attachment
              </a>
            @else
              <span class="text-gray-500">No Attachment</span>
            @endif
        </td>
        <td class="custom-table-cell text-md">{{$issue->due_date}}</td>
        <td class="custom-table-cell text-md">
          {{$issue->user->name}}
        </td>
        <td class="custom-table-cell text-md">{{$issue->total_duration}}</td>
        <td class="custom-table-cell text-md text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="solution" data-full-text="{{ $issue->solution }}">
              <span class="short-text">{{ Str::limit($issue->solution, 60) }}</span>
              <span class="full-text hidden">{{ $issue->solution }}</span>
            </div>
        </td>
        <td class="custom-table-cell text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="remark" data-full-text="{{ $issue->remark }}">
              <span class="short-text">{{ Str::limit($issue->remark, 60) }}</span>
              <span class="full-text hidden">{{ $issue->remark }}</span>
            </div>
        </td>
        <td class="custom-table-cell">
          <div class="flex">
            <form action="{{ route($prefix . '.issue-edit', $issue->id) }}" method="POST">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <button
              type="submit"
              class="btn-edit">
              Edit</button>
            </form>

            <form action="{{ route($prefix . '.issue-delete', $issue->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                type="submit"
                class="btn-delete">Delete</button>
            </form>
          </div> 
        </td>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <a href="{{ route($prefix . '.issue-create') }}">
    <button class="btn-2 mt-1 inline-block">
      Add New Issue
    </button>
  </a>

  <div class="my-4 flex justify-center">
    <div class="bg-white rounded-lg px-6 py-4">
      <ul class="space-x-2">
        {{ $issues->links() }}
      </ul>
    </div>
  </div>
</div>
</x-layout>