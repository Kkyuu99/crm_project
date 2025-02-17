<x-layout>
    <form class="w-full bg-white p-6 rounded-lg" action="admin/" method="POST">
        <h1 class="text-xl font-bold text-left mb-4">New Project</h1>
        <hr class="mb-6">

        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Name</label>
            <input type="text" id="firstName" name="firstName" class="w-full px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Organization Name</label><br>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="flex gap-8">
        <div class="mb-4 ">
            <label class="font-normal text-black justify-start text-sm mb-2">Project Type</label><br>
            <SELECT class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">

                <OPTION Value="Strategic">Strategic</OPTION>
                <OPTION Value="Operational">Operational</OPTION>
                <OPTION Value="Collabotative">Collabotative</OPTION>
                <OPTION Value="Analytical">Analytical</OPTION>
                </SELECT>
        </div>

        <div class="mb-4 px-0">
            <label class="font-normal text-black justify-start text-sm mb-2">Project Manager/Account Manager</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 p-3 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Name</label><br>
            <input type="text" id="name" name="name" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-4 px-0">
            <label class="block font-normal text-black text-sm justify-start mb-1">Created Date</label>
            <div>
              <input 
                type="date" 
                class="w-full px-3 py-1 p-1 bg-neutral-100 border border-gray-300 rounded-lg">
            </div>
        </div>
        </div>    

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Phone</label><br>
            <input type="text" id="phone" name="phone" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="+959-000000000">
        </div>

        <div class="mb-4 px-0">
            <label class="font-normal text-black justify-start text-sm mb-2">Status</label>
            <SELECT class="w-full px-4 py-2 p-1 text-black text-sm bg-sky-300 border border-gray-300 rounded-lg shadow-sm">

                <OPTION Value="Active">active</OPTION>
                <OPTION Value="Inactive">inactive</OPTION>
                </SELECT>
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Email</label><br>
            <input type="text" id="email" name="email" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample@gmail.comm">
        </div>

        <div class="py-6">
            <button type="create" class="w-full px-8 py-2 bg-violet-500 text-white text-sm font-regular rounded-lg shadow-sm hover:bg-violet-400">
                Create
            </button>
        </div>
        </div>   
    </form>
</x-layout>