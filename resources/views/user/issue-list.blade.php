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

  <h1 class="text-2xl font-bold text-black my-4 text-center">Issue List</h1>
  <hr class="border-t-1 border-gray-300 my-4" />
  
  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 custom-table issues-table text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="custom-table-column border border-gray-300 text-md">No.</th>
          <th class="custom-table-column border border-gray-300 text-md">Issue ID</th>
          <th class="custom-table-column border border-gray-300 text-md">Subject</th>
          <th class="custom-table-column border border-gray-300 text-md">Description</th>
          <th class="custom-table-column border border-gray-300 text-md">Project ID</th>
          <th class="custom-table-column border border-gray-300 text-md">Priority</th>
          <th class="custom-table-column border border-gray-300 text-md">Attachment</th>
          <th class="custom-table-column border border-gray-300 text-md">Status</th>
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
        $user = Auth::user();
        $prefix = $user->role === 'admin' ? 'admin' : 'user';
        $issueDetailRoute = route($prefix . '.issue-detail', $issue->id);
      @endphp
      <tr class="hover:bg-gray-100 cursor-pointer" onclick="location.href='{{ $issueDetailRoute }}'">
        <td class="custom-table-cell text-md">{{ $loop->iteration + (($issues->currentPage() - 1) * $issues->perPage()) }}</td>
        <td class="custom-table-cell text-md">{{$issue->id}}</td>
        <td class="custom-table-cell text-md">{{$issue->subject}}</td>
        <td class="custom-table-cell text-md bg-[linear-gradient(to_bottom,_black_30%,_white_90%)] bg-clip-text text-transparent">
            <div class="description" data-full-text="{{ $issue->description }}">
              <span class="short-text">{{ Str::limit($issue->description, 60) }}</span>
              <span class="full-text hidden">{{ $issue->description }}</span>
            </div>
        </td>
        <td class="custom-table-cell text-md">{{$issue->project_id}}</td>
        <td class="custom-table-cell text-md">{{$issue->priority}}</td>
        <td class="custom-table-cell text-md">       
            @if ($issue->attachment)
              <a href="{{ asset('storage/' . $issue->attachment) }}" target="_blank" class="text-blue-500 underline">
              View Attachment
              </a>
            @else
              <span class="text-gray-500">No Attachment</span>
            @endif
        </td>
        <td class="custom-table-cell text-md">{{$issue->issue_status}}</td>
        <td class="custom-table-cell text-md">{{$issue->due_date}}</td>
        <td class="custom-table-cell text-md">{{$issue->assignor_user}}</td>
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
          </div> 
        </td>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <a href="{{ route($prefix . '.issue-create') }}">
    <button class="flex items-center justify-start text-white bg-violet-400 px-6 py-2 rounded-lg hover:bg-violet-500 font-medium text-sm mx-5">
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