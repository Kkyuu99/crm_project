<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Issue_detail</title>
</head>
<body class="bg-gray-100">
    <h1 class="text-4xl font-bold text-black mb-8 text-center">Issus Detail</h1>
    <hr class=" border-t-2 border-gray-300 my-4">

    <div class="w-full max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md">
        <form>

            <div class="mb-4">
                <label for="id" class="block text-black text-sm mb-2">ID</label>
                <input type="text" id="subject" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="ID-001" class="text-black">ID-001</option>
            </div>

            <div class="mb-4">
                <label for="subject" class="block text-black text-sm mb-2">Subject</label>
                <input type="text" id="subject" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="desc" class="block text-black text-sm mb-2">Description</label>
                <input type="text" id="desc" class="w-full px-9 py-14 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4 flex justify-between space-x-4">
                <div class="flex-1 relative">
                    <label for="pri" class="block text-black text-sm font-bold mb-2">Priority</label>
                    <select id="pri" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="high" class="bg-orange-400 text-white">High</option>
                        <option value="medium" class="bg-orange-300 text-white">Medium</option>
                        <option value="low" class="bg-orange-200 text-white">Low</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                         <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>  
                    </div>
                </div>

                <div class="flex-1">
                    <label for="assignor" class="block text-black text-sm font-bold mb-2">Assignor</label>
                    <input type="text" id="assignor" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex-1 relative">
                    <label for="status" class="block text-black text-sm font-bold mb-2">Status</label>
                    <select id="status" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="pending" class="bg-yellow-600 text-white">Pending</option>
                        <option value="new" class="bg-yellow-500 text-black">New</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                         <path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                      </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="attm" class="block text-black text-sm mb-2">Attachment</label>
                <input type="text" id="attm" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>
    </div>
</body>
</html>