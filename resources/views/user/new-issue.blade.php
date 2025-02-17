<x-layout>
    <h1 class="text-3xl font-bold text-black my-4 text-center">Issue Create Form</h1>

    <hr class="border-t-2 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md">
        <form action="/user/issue-store" method="POST">
            @csrf
            <div class="mb-4">
                <label for="project_id" class="block text-black text-sm mb-2">Project Id</label>
                <input
                required
                type="text"
                id="project_id"
                name="project_id"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="subject" class="block text-black text-sm mb-2">Subject</label>
                <input
                required
                type="text"
                id="subject"
                name="subject"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-black text-sm mb-2">Description</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                required
                name="description"
                id="description"
                cols="50"
                rows="2"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div class="mb-4 flex justify-between space-x-4">
                <div class="flex-1">
                    <label for="priority" class="block text-black text-sm font-bold mb-2">Priority</label>
                    <select id="priority" name="priority" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-sm leading-tight focus:outline-none appearance-none">
                        <option value="low" class="bg-red-600 text-white">Low</option>
                        <option value="medium" class="bg-yellow-500 text-black">Medium</option>
                        <option value="high" class="bg-yellow-500 text-black">High</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="assignor_user"
                    class="block text-black text-sm font-bold mb-2">Assignor</label>
                    <input
                    required
                    type="text"
                    id="assignor_user"
                    name="assignor_user"
                    class="w-full px-2 py-1 rounded-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex-1">
                    <label for="issue_status" class="block text-black text-sm font-bold mb-2">Status</label>
                    <select id="issue_status" name="issue_status" class="w-full bg-white border border-gray-300 px-2 py-1 text-sm rounded-sm leading-tight focus:outline-none appearance-none">
                        <option value="open" class="bg-red-600 text-white">Open</option>
                        <option value="in-progress" class="bg-yellow-500 text-black">In-progressed</option>
                        <option value="closed" class="bg-yellow-500 text-black">Closed</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="attachment" class="block text-black text-sm mb-2">Attachment</label>
                <input
                type="file"
                id="attachment"
                name="attachment"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Remark</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                name="remark"
                id="remark"
                cols="50"
                rows="2"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Total Duration</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                name="total_duration"
                id="total_duration"
                cols="50"
                rows="2"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Solution</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                name="solution"
                id="solution"
                cols="50"
                rows="2"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>



            <div class="flex flex-row-reverse  space-x-16 space-x-reverse">
                <button
                type="cancel"
                class="bg-purple-400 text-black px-10 py-4 rounded-md hover:bg-purple-700 font-medium text-sm hover:text-white">
                 Cancel
             </button>
                <button
                   type="submit"
                   class="bg-purple-400 text-black px-10 py-4 rounded-md hover:bg-purple-700 font-medium text-sm hover:text-white">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-layout>
