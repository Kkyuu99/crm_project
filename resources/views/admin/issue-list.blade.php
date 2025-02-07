<x-layout>
<h1 class="text-4xl font-bold text-black mb-8 text-center">Issue List</h1>

    <!-- Table Wrapper with Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 border border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[2000px] text-left">
            <thead>
                <tr class="bg-white text-blue-b">
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">ID</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Subject</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Description</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Priority</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Attachment</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Status</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Solution</th>
                    <th class="border border-gray-300 px-19 py-6 text-center text-xl">Action</th>
                </tr>
            </thead>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0001</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Immediate Assistance Required</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">I'm experiencing an urgent issue with my account.
                        <div class=" text-gray-400">since yesterday receiving the error</div>
                    </td>

                          <td class="inline-block w-64">
                            <div class="bg-gray-500">
                              <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                              onChange="this.className=this.options[this.selectedIndex].className">
                                <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">High</option>
                                <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">Medium</option>
                                <option value="low" class="bg-[#FFFFCC] text-black border border-gray-300 border-2 px-9 py-14 w-full">Low</option>
                                <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Urgent</option>
                              </select>
                            </div>
                          </td>

                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>
                    <td class="inline-block w-64">
                        <div class="bg-gray-500">
                          <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                          onChange="this.className=this.options[this.selectedIndex].className">
                          <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                          <option value="low" class="bg-[#FFFFCC] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Closed</option>
                          <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Resolved</option>
                          </select>
                        </div>
                      </td>
                      <td class="border border-gray-300 px-8 py-6 text-xl">
                    Check Payment Detail: Verify your payment info(card number,expiry,CVV) is correct.
                    </td>
                    
                    <td class="flex justify-center">
                      <a class="bg-yellow-400 px-4 py-2 mr-2">Edit</a>
                      <a class="bg-red-400 px-4 py-2">Delete</a>
                  </td>
                </tr>

                
                
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0002</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Account Access</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">I'm exoeriencing a minor issue with logging into my account.
                        <div class=" text-gray-400">enter my credentials but after clicking</div>
                    </td>

                          <td class="inline-block w-64">
                            <div class="bg-gray-500">
                              <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                              onChange="this.className=this.options[this.selectedIndex].className">
                              <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">High</option>
                                <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">Medium</option>
                                <option value="low" class="bg-[#FFFFCC] text-black border border-gray-300 border-2 px-9 py-14 w-full">Low</option>
                                <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Urgent</option>
                              </select>
                            </div>
                          </td>

                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>
                    <td class="inline-block w-64">
                        <div class="bg-gray-500">
                          <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                          onChange="this.className=this.options[this.selectedIndex].className">
                          <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                          <option value="low" class="bg-[#FFFFCC] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Closed</option>
                          <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Resolved</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl"></td>
                    
                    <td class="flex justify-center">
                      <a class="bg-yellow-400 px-4 py-2 mr-2">Edit</a>
                      <a class="bg-red-400 px-4 py-2">Delete</a>
                  </td>
                </tr>

                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0003</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Delivery Delay</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">I wanted to follow up on the delivery of my recent order.
                        <div class=" text-gray-400">hasn't updated for the last few days</div>
                    </td>

                          <td class="inline-block w-64">
                            <div class="bg-gray-500">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                          onChange="this.className=this.options[this.selectedIndex].className">
                          <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                          <option value="low" class="bg-[#FFFFCC] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Closed</option>
                          <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Resolved</option>
                          </select>
                            </div>
                          </td>

                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>
                    <td class="inline-block w-64">
                        <div class="bg-gray-500">
                          <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                          onChange="this.className=this.options[this.selectedIndex].className">
                          <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                          <option value="low" class="bg-[#FFFFCC] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Closed</option>
                          <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Resolved</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl"></td>
                    
                    <td class="flex justify-center">
                      <a class="bg-yellow-400 px-4 py-2 mr-2">Edit</a>
                      <a class="bg-red-400 px-4 py-2">Delete</a>
                  </td>
                </tr>
                
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0004</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Urgent Issue</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">I'm urgently experiencing an issue with my account.
                        <div class=" text-gray-400">purchase due to a "payment error"</div>
                    </td>

                          <td class="inline-block w-64">
                            <div class="bg-gray-500">
                              <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                              onChange="this.className=this.options[this.selectedIndex].className">
                              <option value="high" class="bg-[#FF9900] text-black text-xl px-9 border border-gray-300 border-2 bor py-14 w-full">High</option>
                                <option value="medium" class="bg-[#FFCC99] text-black text-xl border border-gray-300 border-2 px-9 py-14 w-full">Medium</option>
                                <option value="low" class="bg-[#FFFFCC] text-black text-xl  border border-gray-300 border-2 px-9 py-14 w-full">Low</option>
                                <option value="urgent" class="bg-[#FF9933] text-black text-xl  border border-gray-300 border-2 px-9 py-14 w-full">Urgent</option>
                              </select>
                            </div>
                          </td>

                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>
                    <td class="inline-block w-64">
                        <div class="bg-gray-500">
                          <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight  focus:outline-none"
                          onChange="this.className=this.options[this.selectedIndex].className">
                          <option value="high" class="bg-[#FF9900] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Investigating</option>
                          <option value="medium" class="bg-[#FFCC99] text-black border border-gray-300 border-2 px-9 py-14 w-full">New</option>
                          <option value="low" class="bg-[#FFFFCC] text-black px-9 border border-gray-300 border-2 bor py-14 w-full">Closed</option>
                          <option value="urgent" class="bg-[#FF9933] text-black border border-gray-300 border-2 px-9 py-14 w-full">Resolved</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl"></td>
                    
                    <td class="flex justify-center">
                      <a class="bg-yellow-400 px-4 py-2 mr-2">Edit</a>
                      <a class="bg-red-400 px-4 py-2">Delete</a>
                  </td>
                </tr>

            </tbody>
        </table>
    </div>
    <button class="flex items-center justify-start bg-soft-purple text-white px-6 py-1 rounded-md bg-purple-500 font-medium text-sm mx-2">
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
        <div
          class="text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
          2
        </div>
        <div
          class="text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
          3
        </div>
        <div
          class="text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
          4
        </div>
        <div
          class="text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
          ...
        </div>
        <div
          class="text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
          10
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