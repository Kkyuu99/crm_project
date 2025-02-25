@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <form class="w-full bg-white p-6 rounded-lg" action="{{ route($prefix . '.project-store') }}" method="post">
        @csrf
        
        <h1 class="text-xl font-bold text-left mb-4">New Project</h1>
        <hr class="mb-6">

        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Project Name</label>
            <input type="text" id="project_name" required name="project_name" class="w-full px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Organization Name</label><br>
            <input type="text" id="organization_name" name="organization_name" class="w-full px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="flex gap-8">
        <div class="mb-4 ">
            <label class="font-normal text-black justify-start text-sm mb-2">Project Type</label><br>
            <SELECT name="project_type" required class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">

                <OPTION Value="Strategic">Strategic</OPTION>
                <OPTION Value="Operational">Operational</OPTION>
                <OPTION Value="Collabotative">Collabotative</OPTION>
                <OPTION Value="Analytical">Analytical</OPTION>
                </SELECT>
        </div>

        <div class="mb-4 px-0">
            <label class="font-normal text-black justify-start text-sm mb-2">Project Manager/Account Manager</label>
            <input type="text" id="project_manager" name="project_manager" class="w-full px-4 py-2 p-3 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Name</label><br>
            <input type="text" id="contact_name" name="contact_name" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample Name">
        </div>

        <div class="mb-4 px-0">
            <label class="block font-normal text-black text-sm justify-start mb-1">Created Date</label>
            <div>
              <input 
                type="date" name="created_at" value="{{now()->toDateString()}}"
                class="w-full px-3 py-1 p-1 bg-neutral-100 border border-gray-300 rounded-lg">
            </div>

            <!--  Input for Created By (Current User) -->
            <!-- <label for="created_by">created by:</label>
            <input type="text" id="created_by" name="created_by" value="{{ Auth::id() }}" required> -->
        </div>
        </div>    

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Phone</label><br>
            <input type="text" id="contact_phone" name="contact_phone" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="+959-000000000">
        </div>

        <div class="mb-4 px-0">
            <label class="font-normal text-black justify-start text-sm mb-2">Status</label>
            <SELECT class="w-full px-4 py-2 p-1 text-black text-sm bg-sky-300 border border-gray-300 rounded-lg shadow-sm" name="status">

                <OPTION Value="Active">active</OPTION>
                <OPTION Value="Inactive">inactive</OPTION>
                </SELECT>
        </div>
        </div>

        <div class="flex gap-8">
        <div class="mb-4">
            <label class="font-normal text-black justify-start text-sm mb-2">Contact Email</label><br>
            <input type="text" id="contact_email" name="contact_email" class="w-96 px-4 py-2 p-1 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" placeholder="Sample@gmail.com">
        </div>

        <div class="py-6 flex gap-2">
            <button type="submit" class="w-full px-8 py-2 bg-violet-500 text-white text-sm font-regular rounded-lg shadow-sm hover:bg-violet-400">
                Create
            </button>
            <a href="{{ route($prefix . '.project-list') }}" class="w-full px-8 py-2 bg-red-400 text-white text-sm font-regular rounded-lg shadow-sm hover:bg-red-600">
                Cancel
            </button>
            </a>
        </div>
        </div>   
    </form>
</x-layout>