@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <form class="w-full bg-white p-6 rounded-lg" action="{{ route($prefix . '.project-update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h1 class="text-2xl font-bold text-center mb-4">Edit Project Details</h1>
        <hr class="border-t-1 border-gray-300 my-4" />

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4 space-x-[4.9rem]">
            <label class="text-sm text-black font-normal">Project ID</label>
            <input type="text" id="project-id" name="project_id" value="{{ old('project_id', $project->id) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" readonly>
        </div>

        <div class="mb-4 space-x-[3.45rem]">
            <label class="text-sm text-black font-normal">Project Name</label>
            <input type="text" id="project-name" name="project_name" value="{{ old('project_name', $project->project_name) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

         <div class="mb-4 space-x-[6.25rem]">
            <label class="font-normal text-black text-sm mb-2">Status</label>
            <select name="status" class="w-96 px-4 py-2 p-1 text-black text-sm bg-sky-300 border border-gray-300 rounded-lg shadow-sm" required>
                <option value="Active" {{ old('status', $project->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $project->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-4 space-x-4">
            <label class="text-sm text-black font-normal">Organization Name</label>
            <input type="text" id="organization-name" name="organization_name" value="{{ old('organization_name', $project->organization_name) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4 space-x-[3.8rem]">
            <label class="font-normal text-black text-sm mb-2">Project Type</label>
            <select name="project_type" required class="w-96 px-4 py-2 text-slate-600 text-sm bg-neutral-100 border border-gray-300 rounded-lg shadow-sm">
                <option value="Strategic" {{ old('project_type', $project->project_type) == 'Strategic' ? 'selected' : '' }}>Strategic</option>
                <option value="Operational" {{ old('project_type', $project->project_type) == 'Operational' ? 'selected' : '' }}>Operational</option>
                <option value="Collaborative" {{ old('project_type', $project->project_type) == 'Collaborative' ? 'selected' : '' }}>Collaborative</option>
                <option value="Analytical" {{ old('project_type', $project->project_type) == 'Analytical' ? 'selected' : '' }}>Analytical</option>
            </select>
        </div>

        <div class="mb-4 space-x-[2.2rem]">
            <label class="text-sm text-black font-normal">Project Manager</label>
            <input type="text" id="project-manager" name="project_manager" value="{{ old('project_manager', $project->project_manager) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4 space-x-[2.95rem]">
            <label class="text-sm text-black font-normal">Contact Name</label>
            <input type="text" id="contact-name" name="contact_name" value="{{ old('contact_name', $project->contact_name) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4 space-x-[3.25rem]">
            <label class="text-sm text-black font-normal">Contact Email</label>
            <input type="email" id="contact-email" name="contact_email" value="{{ old('contact_email', $project->contact_email) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div class="mb-4 space-x-[2.85rem]">
            <label class="text-sm text-black font-normal">Contact Phone</label>
            <input type="text" id="contact-phone" name="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
            <a href="{{ route($prefix . '.project-list') }}"
                class="cancel-link">
                Back
            </a>
            <button type="submit" class="create-button">
                Update
            </button>
        </div>
    </form>
</x-layout>