<x-layout>

  <h1 class="text-xl font-bold text-black my-4 text-center">Assigned Issues</h1>

  <!-- Table Wrapper with Horizontal and Vertical Scroll -->
  <div
    class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 rounded-md">
    <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
      <thead>
        <tr class="bg-white text-blue-b">
          <th class="border border-gray-300 px-10 py-3 text-xl">ID</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Subject</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Description</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Priority</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Attachment</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Status</th>
          <th class="border border-gray-300 px-10 py-3 text-xl">Solution</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($issues as $issue)

      <tr class="hover:bg-gray-100">
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->subject}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">
        {{$issue->description}}
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md">
        {{$issue->priority}}
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md">
          <a href="" class="inline text-blue-500 hover:underline text-sm mt-4">image.jpg</a>
        </td>
        <td class="border border-gray-300 px-8 py-2 text-lg">
        {{$issue->issue_status}}
        </td>
        <!-- Custom Arrow Icon -->
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path
          d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
        </svg>
        </div>
        </td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$issue->remark}}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
  <a href="/user/issue-create">
    <button
      class="flex items-center justify-start bg-soft-purple px-6 py-3 rounded-md hover:bg-purple-500 font-medium text-sm mx-2">
      Add New
    </button>
  </a>

  <div class="my-4 flex justify-center">
    <div class="bg-white shadow-md rounded-lg px-6 py-4">
        <ul class="space-x-2">
            {{ $issues->links() }}
        </ul>
    </div>
  </div>
</div>

</x-layout>