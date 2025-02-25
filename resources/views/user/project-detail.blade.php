@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <div class="w-full bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold text-center mb-4">Project Details</h1>
        <hr class="mb-6">

        <!-- Project Details -->
        <div class="mb-4">
            <strong>Project ID: </strong>{{ $project->id }}
        </div>
        <div class="mb-4">
            <strong>Project Name: </strong>{{ $project->project_name }}
        </div>
        <div class="mb-4">
            <strong>Organization Name: </strong>{{ $project->organization_name }}
        </div>
        <div class="mb-4">
            <strong>Project Type: </strong>{{ $project->project_type }}
        </div>
        <div class="mb-4">
            <strong>Project Manager: </strong>{{ $project->project_manager }}
        </div>
        <div class="mb-4">
            <strong>Contact Name: </strong>{{ $project->contact_name }}
        </div>
        <div class="mb-4">
            <strong>Contact Phone: </strong>{{ $project->contact_phone }}
        </div>
        <div class="mb-4">
            <strong>Contact Email: </strong>{{ $project->contact_email }}
        </div>
        <div class="mb-4">
            <strong>Status: </strong>{{ $project->status }}
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route($prefix . '.project-list', $project->id) }}" class="px-4 py-2 bg-orange-600 text-white font-normal rounded-lg shadow-md hover:bg-orange-500">
                Back to Project List
            </a>
        </div>
    </div>
</x-layout>
