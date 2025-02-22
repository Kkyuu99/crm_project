<!-- resources/views/update.blade.php -->

<x-layout>
    <h1 class="text-xl font-bold my-4 text-left ml-4">Update Project</h1>

    <form action="{{ route('user.project-update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Project Name -->
        <div class="mb-4">
            <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
            <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Project Type -->
        <div class="mb-4">
            <label for="project_type" class="block text-sm font-medium text-gray-700">Project Type</label>
            <input type="text" name="project_type" id="project_type" value="{{ old('project_type', $project->project_type) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Organization Name -->
        <div class="mb-4">
            <label for="organization_name" class="block text-sm font-medium text-gray-700">Organization Name</label>
            <input type="text" name="organization_name" id="organization_name" value="{{ old('organization_name', $project->organization_name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Contact Name -->
        <div class="mb-4">
            <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
            <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name', $project->contact_name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Contact Email -->
        <div class="mb-4">
            <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $project->contact_email) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Contact Phone -->
        <div class="mb-4">
            <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                <option value="Active" {{ old('status', $project->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $project->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md">Update Project</button>
    </form>
</x-layout>
