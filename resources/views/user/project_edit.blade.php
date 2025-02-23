<x-layout>
    <form class="w-full bg-white p-6 rounded-lg shadow-md" action="{{ route('user.project-update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-xl font-bold text-center mb-4">Project Detail</h1>
        <hr class="mb-6">

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Project ID -->
        <div class="mb-4 flex space-x-4 px-20">
            <label class="text-sm text-black font-normal">Project ID</label>
            <input type="text" id="Project-id" name="Project-id" value="{{ old('Project-id', $project->id) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" readonly>
        </div>

        <!-- Project Name -->
        <div class="mb-4 flex justify-start space-x-4 px-14">
            <label class="text-sm text-black font-normal">Project Name</label>
            <input type="text" id="project-name" name="project-name" value="{{ old('project-name', $project->project_name) }}" class="w-96 px-4 py-2 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Organization Name -->
        <div class="mb-4 flex justify-start space-x-4 px-5">
            <label class="text-sm text-black font-normal">Organization Name</label>
            <input type="text" id="organization-name" name="organization-name" value="{{ old('organization-name', $project->organization_name) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Project Type -->
        <div class="mb-4 flex justify-start space-x-4 px-16">
            <label class="text-sm text-black font-normal">Project Type</label>
            <input type="text" id="project-type" name="project-type" value="{{ old('project-type', $project->project_type) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Project Manager -->
        <div class="mb-4 flex justify-start space-x-4 px-10">
            <label class="text-sm text-black font-normal">Project Manager</label>
            <input type="text" id="project-manager" name="project-manager" value="{{ old('project-manager', $project->project_manager) }}" class="w-96 px-2 py-1 text-slate-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Status -->
        <div class="mb-4 flex justify-start space-x-4 px-24">
            <label class="text-sm text-black font-normal">Status</label>
            <input type="text" id="status" name="status" value="{{ old('status', $project->status) }}" class="w-96 px-2 py-1 text-green-600 bg-neutral-100 border border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-start space-x-4 px-24">
            <!-- Close Button: JavaScript-based redirect -->
            <button type="button" onclick="window.location.href='{{ route('user.project-list') }}';" class="px-4 py-0 bg-orange-600 text-white font-normal rounded-lg shadow-md hover:bg-orange-500">
                Close
            </button>

            <!-- Update Button: Submit form -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-normal rounded-lg shadow-md hover:bg-blue-400">
                Update Project
            </button>
        </div>
    </form>
</x-layout>
