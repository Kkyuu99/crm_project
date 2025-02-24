@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <form class="w-full bg-white p-6 rounded-lg shadow-md" action="{{ route($prefix . '.project-update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-xl font-bold text-center mb-4">Project Detail</h1>
        <hr class="mb-6">

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <!-- Project ID -->
        <div class="mb-4 flex space-x-4 px-20">
            <label class="text-sm text-black font-normal">Project ID</label>
            <input type="text" id="Project-id" name="project_id" value="{{ old('project_id', $project->id) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" readonly>
        </div>

        <!-- Project Name -->
        <div class="mb-4 flex justify-start space-x-4 px-14">
            <label class="text-sm text-black font-normal">Project Name</label>
            <input type="text" id="project-name" name="project_name" value="{{ old('project_name', $project->project_name) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Organization Name -->
        <div class="mb-4 flex justify-start space-x-4 px-5">
            <label class="text-sm text-black font-normal">Organization Name</label>
            <input type="text" id="organization-name" name="organization_name" value="{{ old('organization_name', $project->organization_name) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Project Type -->
        <div class="mb-4 flex justify-start space-x-4 px-16">
            <label class="text-sm text-black font-normal">Project Type</label>
            <input type="text" id="project-type" name="project_type" value="{{ old('project_type', $project->project_type) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Project Manager -->
        <div class="mb-4 flex justify-start space-x-4 px-10">
            <label class="text-sm text-black font-normal">Project Manager</label>
            <input type="text" id="project-manager" name="project_manager" value="{{ old('project_manager', $project->project_manager) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Contact Name -->
        <div class="mb-4 flex justify-start space-x-4 px-16">
            <label class="text-sm text-black font-normal">Contact Name</label>
            <input type="text" id="contact-name" name="contact_name" value="{{ old('contact_name', $project->contact_name) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Contact Phone -->
        <div class="mb-4 flex justify-start space-x-4 px-16">
            <label class="text-sm text-black font-normal">Contact Phone</label>
            <input type="text" id="contact-phone" name="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Status -->
        <div class="mb-4 flex justify-start space-x-4 px-24">
            <label class="text-sm text-black font-normal">Status</label>
            <input type="text" id="status" name="status" value="{{ old('status', $project->status) }}" class="w-96 px-2 py-1 text-green-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-start space-x-4 px-24">
            <!-- Close Button: JavaScript-based redirect -->
             <a href="{{  route($prefix . '.project-list')  }}"
              class="px-4 py-0 bg-orange-600 text-white font-normal rounded-lg shadow-md hover:bg-orange-500">
                Close
            </a>

            <!-- Update Button: Submit form -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-normal rounded-lg shadow-md hover:bg-blue-400">
                Update Project
            </button>
        </div>
    </form>
<<<<<<< HEAD
</x-layout>
=======
</x-layout>
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26
