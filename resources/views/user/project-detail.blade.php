@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <div class="w-full bg-white p-6 rounded-lg">
        <h1 class="text-xl font-bold text-center mb-4">Project Details</h1>
        <hr class="mb-6">

        <!-- Project Details -->
        <div class="bg-white rounded-lg p-6">
    
        
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Project ID: </strong>
            <input type="text" id="project-id" name="project_id" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300 border border-gray-300 rounded-lg shadow-sm" value="{{ $project->id }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right"> Project Name: </strong>
            <input type="text" id="project-name" name="project_name" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->project_name }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Status: </strong>
            <input type="text" id="status" name="status" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->status }}" disable>
        </div>
        <div class="flex mb-4 space-x-7 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-18 text-right">Organization Name: </strong>
            <input type="text" id="organization-name" name="organization_name" class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->organization_name }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Project Type: </strong>
            <input type="text" id="project-type" name="project_type" class="flex-1 w-96 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->project_type }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Project Manager: </strong>
            <input type="text" id="project-manager" name="project_manager" class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->project_manager }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Contact Name: </strong>
            <input type="text" id="contact-name" name="contact_name" class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->contact_name }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Contact Email: </strong>
            <input type="text" id="contact-email" name="contact_email" class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->contact_email }}" disabled>
        </div>
        <div class="flex mb-4 space-x-9 w-3/4 mx-auto text-center">
            <strong class="text-gray-700 w-36 text-right">Contact Phone: </strong>
            <input type="text" id="contact-phone" name="contact_phone" class="flex-1 w-64 px-4 py-2 text-slate-600 bg-gray-300  border border-gray-300 rounded-lg shadow-sm" value="{{ $project->contact_phone }}" disabled>
        </div>
        </div>


        <!-- Action Buttons -->
        <div class="flex justify-center space-x-8 px-24">
        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route($prefix . '.project-list', $project->id) }}" class="px-4 py-1 bg-orange-400 text-white font-normal rounded-lg shadow-md hover:bg-orange-600">
                Back to Project List
            </a>
        </div>

        <!-- Edit Button -->
        <div class="mt-6">
            <a href="{{ route($prefix . '.project-edit', $project->id) }}" class="px-4 py-1 bg-violet-400 text-white font-normal rounded-lg shadow-md hover:bg-violet-600">
                Edit
            </a>
        </div>
    </div>
</x-layout>