@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <form class="w-full bg-white p-6 rounded-lg" action="{{ route($prefix . '.project-update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-xl font-bold text-center mb-4">Edit Project Details</h1>
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

        <!-- Project ID (Readonly for Editing) -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right"">Project ID</label>
            <input type="text" id="project-id" name="project_id" value="{{ old('project_id', $project->id) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" readonly>
        </div>

        <!-- Project Name -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Project Name</label>
            <input type="text" id="project-name" name="project_name" value="{{ old('project_name', $project->project_name) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

         <!-- Status (Select Dropdown) -->
         <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Status</label>
            <select name="status" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-sky-300 border border-gray-300 rounded-lg shadow-sm" required>
                <option value="Active" {{ old('status', $project->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $project->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Organization Name -->
        <div class="flex mb-4 space-x-10 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-18 text-right">Organization Name</label>
            <input type="text" id="organization-name" name="organization_name" value="{{ old('organization_name', $project->organization_name) }}"class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Project Type (Select Dropdown) -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Project Type</label>
            <select name="project_type" required class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm">
                <option value="Strategic" {{ old('project_type', $project->project_type) == 'Strategic' ? 'selected' : '' }}>Strategic</option>
                <option value="Operational" {{ old('project_type', $project->project_type) == 'Operational' ? 'selected' : '' }}>Operational</option>
                <option value="Collaborative" {{ old('project_type', $project->project_type) == 'Collaborative' ? 'selected' : '' }}>Collaborative</option>
                <option value="Analytical" {{ old('project_type', $project->project_type) == 'Analytical' ? 'selected' : '' }}>Analytical</option>
            </select>
        </div>

        <!-- Project Manager -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Project Manager</label>
            <input type="text" id="project-manager" name="project_manager" value="{{ old('project_manager', $project->project_manager) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Contact Name -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Contact Name</label>
            <input type="text" id="contact-name" name="contact_name" value="{{ old('contact_name', $project->contact_name) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Contact Email -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Contact Email</label>
            <input type="email" id="contact-email" name="contact_email" value="{{ old('contact_email', $project->contact_email) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Contact Phone -->
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <label class="text-gray-700 w-36 text-right">Contact Phone</label>
            <input type="text" id="contact-phone" name="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center space-x-8 px-24">
            <!-- Close Button -->
            <a href="{{  route($prefix . '.project-list')  }}" class="px-4 py-1 bg-orange-400 text-white font-normal rounded-lg shadow-md hover:bg-orange-600">
                Close
            </a>

            <!-- Update Button -->
            <button type="submit" class="px-4 py-1 bg-violet-400 text-white font-normal rounded-lg shadow-md hover:bg-violet-600">
                Update Project
            </button>
        </div>
    </form>
</x-layout>