<x-layout>

    <div class="w-full bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold text-center mb-4">Project Details</h1>
        <hr class="mb-6">

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Project ID</label>
            <input disabled type="text" id="project-id" name="project_id" value="{{ old('project_id', $project->id) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" readonly>
        </div>
        
        <div class="mb-4">
            <label class="text-sm text-black font-normal">Project Name</label>
            <input disabled type="text" id="project-name" name="project_name" value="{{ old('project_name', $project->project_name) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Organization Name</label>
            <input disabled type="text" id="organization-name" name="organization_name" value="{{ old('organization_name', $project->organization_name) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="font-normal text-black text-sm mb-2">Project Type</label><br>
            <select disabled name="project_type" required class="w-full px-4 py-2 text-slate-600 input-boxes">
                <option value="Strategic" {{ old('project_type', $project->project_type) == 'Strategic' ? 'selected' : '' }}>Strategic</option>
                <option value="Operational" {{ old('project_type', $project->project_type) == 'Operational' ? 'selected' : '' }}>Operational</option>
                <option value="Collaborative" {{ old('project_type', $project->project_type) == 'Collaborative' ? 'selected' : '' }}>Collaborative</option>
                <option value="Analytical" {{ old('project_type', $project->project_type) == 'Analytical' ? 'selected' : '' }}>Analytical</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Project Manager</label>
            <input disabled type="text" id="project-manager" name="project_manager" value="{{ old('project_manager', $project->project_manager) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Contact Name</label>
            <input disabled type="text" id="contact-name" name="contact_name" value="{{ old('contact_name', $project->contact_name) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Contact Email</label>
            <input disabled type="email" id="contact-email" name="contact_email" value="{{ old('contact_email', $project->contact_email) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="text-sm text-black font-normal">Contact Phone</label>
            <input disabled type="text" id="contact-phone" name="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
        </div>

        <div class="mb-4">
            <label class="font-normal text-black mb-2">Status</label>
            <select disabled name="status" class="w-full px-4 py-2 text-slate-600 input-boxes" required>
                <option value="Active" {{ old('status', $project->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $project->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
            <a href="{{ route($prefix . '.project-list') }}"
                class="cancel-btn">
                Back
            </a>
            @if(Auth::user()->role === 'admin')
            <form action="{{ route($prefix . '.project-edit', $project->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <button
                type="submit"
                class="create-btn">
                Edit</button>
            </form>
            @endif
        </div>
    </div>
</x-layout>