<x-layout>

  <h1 class="text-4xl font-bold text-black mb-8 text-center">Assigned Issues</h1>

  <!-- Table Wrapper with Horizontal and Vertical Scroll -->
  <div
    class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 border border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
      <thead>
        <tr class="bg-white text-blue-b">
          <th class="border border-gray-300 px-19 py-6 text-xl">ID</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Subject</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Description</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Priority</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Attachment</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Status</th>
          <th class="border border-gray-300 px-19 py-6 text-xl">Solution</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($issues as $issue)
        
        <tr class="hover:bg-gray-100">
          <td class="border border-gray-300 px-8 py-6 text-xl">{{$issue->id}}</td>
          <td class="border border-gray-300 px-8 py-6 text-xl">{{$issue->subject}}</td>
          <td class="border border-gray-300 px-8 py-6 text-xl">
            {{$issue->description}}
          </td>
          <td class="relative inline-block w-64">
            <div class="relative bg-gray-500">
              {{$issue->priority}}
            </div>
          </td>
          <td class="border border-gray-300 px-8 py-6 text-xl">
            <a href="" class="inline text-blue-500 hover:underline text-sm mt-4">image.jpg</a>
          </td>
          <td class="relative inline-block w-64">
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
          <td class="border border-gray-300 px-8 py-6 text-xl">{{$issue->remark}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <a href="/user/issue-create">
    <button
    class="flex items-center justify-start bg-soft-purple text-white px-6 py-1 rounded-md hover:bg-purple-500 font-medium text-sm mx-2">
    Add New
  </button>
  </a>
  <div class="flex items-center justify-end bg-gray-100 p-2 rounded-md w-fit ml-auto">
    <!-- Left Arrow -->
    <button
      class="arr left bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
      aria-label="Previous" title="Previous">
      <span>&lt;</span>
    </button>

    <!-- Center Label -->
    <div class="bg-soft-purple text-white px-6 py-1 rounded-md font-medium text-sm mx-2">
      1
    </div>

    <!-- Right Arrow -->
    <button
      class="arr right bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
      aria-label="Next" title="Next">
      <span>&gt;</span>
    </button>
  </div>


  </div>

</x-layout>