<x-layout>
  <h1 class="text-2xl font-bold text-black my-4 text-center">Assigned Issues</h1>
  <hr class="border-t-1 border-gray-300 my-4" />
  <!-- Table Wrapper with Horizontal and Vertical Scroll -->
  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 min-w-[2500px] text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">No.</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Issue ID</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Subject</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Description</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Project ID</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Priority</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Attachment</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Status</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Total Duration</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Solution</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Remark</th>
          <th class="border border-gray-300 px-10 py-3 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($issues as $issue)
      <tr class="hover:bg-gray-100">
        <td class="border border-gray-300 px-8 py-2 text-md">{{ $loop->iteration + (($issues->currentPage() - 1) * $issues->perPage()) }}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->subject}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md" style="background: linear-gradient(to bottom, black 50%, white 100%); -webkit-background-clip: text; color: transparent;">
            <div class="description" data-full-text="{{ $issue->description }}">
              <span class="short-text">{{ Str::limit($issue->description, 60) }}</span>
              <span class="full-text hidden">{{ $issue->description }}</span>
            </div>
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->project_id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->priority}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">       
            @if ($issue->attachment)
            <a href="{{ asset('storage/' . $issue->attachment) }}" class="inline text-blue-500 hover:underline text-sm mt-4">
              <!-- Display the file name -->
              <div class="description" data-full-text="{{ $issue->attachment }}">
                <span class="short-text">{{ Str::limit(basename($issue->attachment), 10) }}</span>
                <span class="full-text hidden">{{  basename($issue->attachment) }}</span>
              </div>
              </a>
            @else
              No attachment
            @endif
          
        </td>
        <td class="border border-gray-300 px-8 py-2">{{$issue->issue_status}}</td>
        
        <!-- Custom Arrow Icon -->
        <!-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path
          d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
        </div>
        </td> -->
        <td class="border border-gray-300 px-8 py-2">{{$issue->total_duration}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md" style="background: linear-gradient(to bottom, black 50%, white 100%); -webkit-background-clip: text; color: transparent;">
            <div class="solution" data-full-text="{{ $issue->solution }}">
              <span class="short-text">{{ Str::limit($issue->solution, 60) }}</span>
              <span class="full-text hidden">{{ $issue->solution }}</span>
            </div>
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md" style="background: linear-gradient(to bottom, black 50%, white 100%); -webkit-background-clip: text; color: transparent;">
            <div class="remark" data-full-text="{{ $issue->remark }}">
              <span class="short-text">{{ Str::limit($issue->remark, 60) }}</span>
              <span class="full-text hidden">{{ $issue->remark }}</span>
            </div>
        </td>
        <td class="flex justify-center px-4 py-7">
          <form action="{{ route('issue-edit', $issue->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button
            type="submit"
            class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">
            Edit</button>
          </form>
          <form action="/user/{{ $issue->id }}/issue-delete" method="POST">
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
  
  <button
    class="flex items-center justify-start text-white bg-purple-400 px-6 py-2 rounded-lg hover:bg-purple-500 font-medium text-sm mx-5"
    onclick="window.location.href='/user/issue-create'">
    Add New
  </button>

  <div class="my-4 flex justify-center">
    <div class="bg-white rounded-lg px-6 py-4">
      <ul class="space-x-2">
        {{ $issues->links() }}
      </ul>
    </div>
  </div>
  </div>
</x-layout>