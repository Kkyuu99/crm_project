<x-layout>
    <h1 class="text-4xl font-bold text-black mb-8 text-center">New Issue</h1>

    <hr class="border-t-2 border-gray-300 my-4" />

    <div class="w-full max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md">
        <form>

            <div class="mb-4">
                <label for="id" class="block text-black text-sm mb-2">ID</label>
                <input type="text" id="id" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>


            <div class="mb-4">
                <label for="subject" class="block text-black text-sm mb-2">Subject</label>
                <input type="text" id="subject" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>


            <div class="mb-4">
                <label for="desc" class="block text-black text-sm mb-2">Description</label>
                <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Priority, Assignor, Status -->
            <div class="mb-4 flex justify-between space-x-4">

                <div class="flex-1">
                    <label for="pri" class="block text-black text-sm font-bold mb-2">Priority</label>
                    <select id="pri" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="high" class="bg-red-600 text-white">High</option>
                        <option value="medium" class="bg-yellow-500 text-black">Medium</option>
                    </select>
                </div>


                <div class="flex-1">
                    <label for="assignor" class="block text-black text-sm font-bold mb-2">Assignor</label>
                    <input type="text" id="assignor" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>


                <div class="flex-1">
                    <label for="status" class="block text-black text-sm font-bold mb-2">Status</label>
                    <select id="status" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="high" class="bg-red-600 text-white">Investigating</option>
                        <option value="medium" class="bg-yellow-500 text-black">New</option>
                    </select>
                </div>
            </div>


            <div class="mb-4">
                <label for="attm" class="block text-black text-sm mb-2">Attachment</label>
                <input type="text" id="attm" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>


            <div class="flex flex-row-reverse">
                <button class="bg-soft-purple text-white px-6 py-1 rounded-md hover:bg-purple-500 font-medium text-sm">
                    Save
                </button>
            </div>

        </form>
    </div>
</x-layout>
