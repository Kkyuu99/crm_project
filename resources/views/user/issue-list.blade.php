<x-layout>
  <h1 class="text-2xl font-bold text-black my-4 text-center">Assigned Issues</h1>
  <hr class="border-t-1 border-gray-300 my-4" />
  <!-- Table Wrapper with Horizontal and Vertical Scroll -->
  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 min-w-[2500px] text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">No.</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Issue ID</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Subject</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Description</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Project ID</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Priority</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Attachment</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Status</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Due date</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Total Duration</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Assignor/ User</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Solution</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Remark</th>
          <th class="border border-gray-300 px-6 py-2 text-md text-center bg-gray-100 text-gray-500">Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($issues as $issue)
      @php
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        $issueDetailRoute = route($prefix . '.issue-detail', $issue->id);
      @endphp
      <tr class="hover:bg-gray-100 cursor-pointer" onclick="location.href='{{ $issueDetailRoute }}'">
        <td class="border border-gray-300 px-8 py-2 text-md">{{ $loop->iteration + (($issues->currentPage() - 1) * $issues->perPage()) }}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->subject}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="description" data-full-text="{{ $issue->description }}">
              <span class="short-text">{{ Str::limit($issue->description, 60) }}</span>
              <span class="full-text hidden">{{ $issue->description }}</span>
            </div>
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->project_id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->priority}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">       
            @if ($issue->attachment)
              <a href="{{ asset('storage/' . $issue->attachment) }}" target="_blank" class="text-blue-500 underline">
              View Attachment
              </a>
            @else
              <span class="text-gray-500">No Attachment</span>
            @endif
          
        </td>
        <td class="border border-gray-300 px-8 py-2">{{$issue->issue_status}}</td>
        <td class="border border-gray-300 px-8 py-2">{{$issue->due_date}}</td>
        <!-- Custom Arrow Icon -->
        <!-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path
          d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
        </div>
        </td> -->
        <td class="border border-gray-300 px-8 py-2">{{$issue->total_duration}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="solution" data-full-text="{{ $issue->solution }}">
              <span class="short-text">{{ Str::limit($issue->solution, 60) }}</span>
              <span class="full-text hidden">{{ $issue->solution }}</span>
            </div>
        </td>
        <td class="border border-gray-300 px-8 py-2">{{$issue->assignor_user}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="remark" data-full-text="{{ $issue->remark }}">
              <span class="short-text">{{ Str::limit($issue->remark, 60) }}</span>
              <span class="full-text hidden">{{ $issue->remark }}</span>
            </div>
        </td>
        <td class="flex justify-center px-4 py-7">
          <form action="{{ route($prefix . '.issue-edit', $issue->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button
            type="submit"
            class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">
            Edit</button>
          </form>

          <form action="{{ route($prefix . '.issue-delete', $issue->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button
              type="submit"
              class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
          </form>
          
      </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  
  <a href="{{ route($prefix . '.issue-create') }}">
  <button
    class="flex items-center justify-start text-white bg-violet-400 px-6 py-2 rounded-lg hover:bg-violet-500 font-medium text-sm mx-5"
    >
    Add New
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
