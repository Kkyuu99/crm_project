<x-layout>
    <form class="w-full bg-white p-6 rounded-lg shadow-md" action="/update-profile" method="POST">
        <h1 class="text-xl font-bold text-center mb-4">Project Detail</h1>
        <hr class="mb-6">
    
        <div class="mb-4 flex space-x-4 px-20">
            <label class="text-sm text-black font-normal">Project ID</label>
            <input type="text" id="Project-id" name="Project-id" class="w-96 px-4 py-2 justify-end text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="mb-4 flex justify-start space-x-4 px-14">
            <label class="text-sm text-black font-normal">Project Name</label>
            <input type="text" id="project-name" name="project-name" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="mb-4 flex justify-start space-x-4 px-5">
            <label class="text-sm text-black font-normal">Organization Name</label>
            <input type="text" id="organization-name" name="organization-name" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="mb-4 flex justify-start space-x-4 px-16">
            <label class="text-sm text-black font-normal">Project Type</label>
            <input type="text" id="project-type" name="project-type" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="mb-4 flex justify-start space-x-4 px-10">
            <label class="text-sm text-black font-normal">Project Manager</label>
            <input type="text" id="project-manager" name="project-manager" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="mb-4 flex justify-start space-x-4 px-24">
            <label class="text-sm text-black font-normal">Status</label>
            <input type="text" id="status" name="status" class="w-96 px-2 py-1 text-green-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="">
        </div>

        <div class="flex justify-start space-x-4 px-24">
            <label class="text-sm text-black font-normal">Action</label>
            <button type="close" class=" px-4 py-0 bg-orange-600 text-white font-normal rounded-lg shadow-md hover:bg-orange-500">
                Close
            </button>
            <button type="delete" class="px-4 py-0 bg-orange-600 text-white font-normal rounded-lg shadow-md hover:bg-orange-500">
                Delete
            </button>
        </div>
        <br><br><br><br><br><br><br>

        <div class="">
            <button type="back" class="w-32 h-7 justify-end bg-violet-400 text-white text-sm font-regular rounded-lg shadow-sm hover:bg-violet-300">
                Back
            </button>
        </div>


    </form>
</x-layout>