<x-layout>

    <h1 class="text-4xl font-bold text-black mb-8 text-center">Assigned Issues</h1>

    <!-- Table Wrapper with Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 border border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
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
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0001</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Immediate Assistance Required</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">I'm experiencing an urgent issue with my account I've been unable to log in
                        <div class=" text-gray-400">since yesterday receiving the error</div>
                    </td>

                          <td class="relative inline-block w-64">
                            <div class="relative bg-gray-500">
                              <select class="block w-full py-14 bg-white-100 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                              onChange="this.className=this.options[this.selectedIndex].className">
                               <option value="" disabled selected class="bg-white-100">Select Priority</option>
                                <option value="high" class="bg-red-600 text-white px-9 border border-gray-300 border-2 bor py-14 w-full">High</option>
                                <option value="medium" class="bg-yellow-500 text-white border border-gray-300 border-2 px-9 py-14 w-full">Medium</option>
                                <option value="low" class="bg-green-600 text-white border border-gray-300 border-2 px-9 py-14 w-full">Low</option>
                              </select>
                            </div>
                          </td>

                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a href="" class="inline text-blue-500 hover:underline text-sm mt-4">image.jpg</a>
                    </td>
                    <td class="relative inline-block w-64">
                        <select class="block w-full py-14 bg-white-100 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                        onChange="this.className=this.options[this.selectedIndex].className">
                         <option value="" disabled selected class="bg-white-100">Select Priority</option>
                          <option value="Investigating" class="bg-red-600 text-white px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="new" class="bg-yellow-500 text-white border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                        </select>
                      </div>
                    </td>
                          <!-- Custom Arrow Icon -->
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                             <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                          </div>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Solution</td>
                </tr>

            </tbody>
        </table>
    </div>
    <button class="flex items-center justify-start bg-purple-500 text-white px-6 py-1 rounded-md hover:bg-purple-400 font-medium text-sm mx-2">
      Add New
    </button>
    <div class="flex items-center justify-end bg-gray-100 p-2 rounded-md w-fit ml-auto">
        <!-- Left Arrow -->
        <button
          class="arr left bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
          aria-label="Previous"
          title="Previous">
          <span>&lt;</span>
        </button>

        <!-- Center Label -->
        <div
          class="bg-purple-400 text-white px-6 py-1 rounded-md font-medium text-sm mx-2">
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


    </div>

</x-layout>
