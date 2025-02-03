<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Issue</title>
</head>
<body>
    <h1 class="text-4xl font-bold text-black mb-8 text-center">Issue List</h1>
    
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 border border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[2000px] text-left">
            <thead>
                <tr class="bg-white text-blue-b">
                    <th class="border border-gray-300 px-19 py-6 text-center">ID</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Subject</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Description</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Priority</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Assigner</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Status</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Solution</th>
                    <th class="border border-gray-300 px-19 py-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0001</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Immediate Assistance Required</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        I'm experiencing an urgent issue with my account. I've been unable to log in 
                        <div class="text-gray-400">since yesterday, receiving the error</div>
                    </td>
                    
                        <td class="relative inline-block w-64">
                          <div class="relative">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                              <option value="high" class="bg-orange-400 text-white px-9 border-2 py-14 w-full">High</option>
                              <option value="medium" class="bg-orange-300 text-white px-9 border-2 py-14 w-full">Medium</option>
                              <option value="low" class="bg-orange-200 text-white px-9 border-2 py-14 w-full">Low</option>
                              <option value="urgent" class="bg-orange-600 text-white px-9 border-2 py-14 w-full">Urgent</option>
                            </select>
                          </div>
                        </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a href="" class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>
                    <td class="relative inline-block w-64">
                        <div class="relative bg-gray-500">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-amber-200 text-white">Investigating</option>
                            <option value="medium" class="bg-neutral-300 text-black">New</option>
                            <option value="low" class="bg-neutral-400 text-white">Closed</option>
                            <option value="urgent" class="bg-green-300 text-white">Resolved</option>
                        </select>
                        
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />  
                        </div>
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
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        I'm experiencing a minor issue with logging into my account. I'm able to 
                        <div class="text-gray-400">since my credentials but after clicking</div>
                    </td>
                    
                    <td class="relative inline-block w-64">
                        <div class="relative">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-orange-400 text-white px-9 border-2 py-14 w-full">Medium</option>
                            <option value="medium" class="bg-orange-300 text-white px-9 border-2 py-14 w-full">High</option>
                            <option value="low" class="bg-orange-200 text-white px-9 border-2 py-14 w-full">Low</option>
                            <option value="urgent" class="bg-orange-600 text-white px-9 border-2 py-14 w-full">Urgent</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a href="" class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>

                    <td class="relative inline-block w-64">
                        <div class="relative bg-gray-500">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-amber-200 text-white">New</option>
                            <option value="medium" class="bg-neutral-300 text-black">Investigating</option>
                            <option value="low" class="bg-neutral-400 text-white">Closed</option>
                            <option value="urgent" class="bg-green-300 text-white">Resolved</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
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
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0003</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Delivery Delay</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        I wanted to follow up on the delivery of my recent order. The tracking status
                        <div class="text-gray-400">hasn't updated for the last few days.</div>
                    </td>
                    
                    <td class="relative inline-block w-64">
                        <div class="relative">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-orange-200 text-white px-9 border-2 py-14 w-full">Low</option>
                            <option value="medium" class="bg-orange-300 text-white px-9 border-2 py-14 w-full">Medium</option>
                            <option value="low" class="bg-orange-400 text-white px-9 border-2 py-14 w-full">High</option>
                            <option value="urgent" class="bg-orange-600 text-white px-9 border-2 py-14 w-full">Urgent</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>

                    <td class="relative inline-block w-64">
                        <div class="relative bg-gray-500">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-amber-200 text-white">Closed</option>
                            <option value="medium" class="bg-neutral-300 text-black">Investigating</option>
                            <option value="low" class="bg-neutral-400 text-white">New</option>
                            <option value="urgent" class="bg-green-300 text-white">Resolved</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />  
                        </div>
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
                    <td class="border border-gray-300 px-8 py-6 text-xl">ID_0004</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Urgent Issue</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        I'm urgently experiencing an issue with my account. I'm unable to complete my
                        <div class="text-gray-400">purchase due to a "payment error"</div>
                    </td>
                    
                    <td class="relative inline-block w-64">
                        <div class="relative">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-orange-600 text-white px-9 border-2 py-14 w-full">Urgent</option>
                            <option value="medium" class="bg-orange-400 text-white px-9 border-2 py-14 w-full">High</option>
                            <option value="low" class="bg-orange-200 text-white px-9 border-2 py-14 w-full">Low</option>
                            <option value="urgent" class="bg-orange-300 text-white px-9 border-2 py-14 w-full">Medium</option>
                          </select>
                        </div>
                      </td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">
                        <a href="" class="inline text-blue-500 hover:underline text-xl mt-4">Name</a>
                    </td>

                    <td class="relative inline-block w-64">
                        <div class="relative">
                            <select class="block w-full py-14 bg-gray-500 border border-gray-300 px-9 text-xl rounded-lg leading-tight focus:outline-none"
                            onChange="this.className=this.option[this.selectedIndex].className">
                            <option value="high" class="bg-amber-200 text-white">Resolved</option>
                            <option value="medium" class="bg-neutral-300 text-black">New</option>
                            <option value="low" class="bg-neutral-400 text-white">Closed</option>
                            <option value="urgent" class="bg-green-300 text-white">Investigating</option>
                        </select>
                            <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />  
                        </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button class="flex items-center justify-start bg-purple-400 text-white px-6 py-1 rounded-md hover:bg-purple-500 font-medium text-sm mx-2">
        Add New
    </button>
    <div class="flex items-center justify-end bg-gray-100 rounded-md w-fit ml-auto">
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
            class=" text-black px-6 py-1 rounded-md font-medium text-sm mx-2">
            2
          </div>
          <div
            class=" text-black px-6 py-1 font-medium text-sm mx-2">
            3
          </div>
          <div
          class=" text-black px-6 py-1 font-medium text-sm mx-2">
          4
         </div>
         <div
         class=" text-black px-6 py-1 font-medium text-sm mx-2">
         ...
         </div>
         <div
         class=" text-black px-6 py-1 font-medium text-sm mx-2">
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
</body>
</html>
