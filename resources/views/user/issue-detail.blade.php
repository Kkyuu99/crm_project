@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

<x-layout>
    <h1 class="text-2xl font-bold text-black my-4 text-center">Issue Detail</h1>
    <hr class="border-t-1 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-4xl mx-auto p-2">
    <div class="mb-4">
                <label for="issue_id" class="block text-black text-sm mb-2">Issue ID</label>
                <input
                type="text" 
                id="issue_id" 
                name="issue_id" 
                value="{{ old('issue_id', $issue->id) }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                disabled>
            </div>
            <div class="mb-4">
                <label for="project_id" class="block text-black text-sm mb-2">Project ID</label>
                <select
                    disabled
                    id="project_id"
                    name="project_id"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <option value="">Select a project</option>

                @foreach($projects as $project)
                    <option value="{{ $project->id }}" 
                        {{ old('project_id', $issue->project_id ?? '') == $project->id ? 'selected' : '' }}>
                        {{ $project->id }} : {{ $project->project_name }}
                    </option>
                @endforeach
            </select>
            </div>

            <div class="mb-4">
                <label for="subject" class="block text-black text-sm mb-2">Subject</label>
                <input 
                disabled
                type="text" 
                id="subject" 
                name="subject"
                value="{{ old('subject', $issue->subject) }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-black text-sm mb-2">Description</label>
                {{-- <input type="text" id="desc" class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                disabled
                name="description"
                id="description"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="px-4 py-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description', $issue->description) }}</textarea>
            </div>
            <div class="mb-4 flex justify-between space-x-4">
                <div class="flex-1">
                    <label for="priority" class="block text-black text-sm mb-2">Priority</label>
                    <select disabled id="priority" name="priority" class="w-full bg-white border border-gray-300 px-4 py-2 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="Low" {{ old('priority', $issue->priority) == 'Low' ? 'selected' : '' }} class="bg-yellow-200 text-black">Low</option>
                        <option value="Medium" {{ old('priority', $issue->priority) == 'Medium' ? 'selected' : '' }} class="bg-yellow-500 text-black">Medium</option>
                        <option value="High" {{ old('priority', $issue->priority) == 'High' ? 'selected' : '' }} class="bg-orange-400 text-black">High</option>
                        <option value="Urgent" {{ old('priority', $issue->priority) == 'Urgent' ? 'selected' : '' }} class="bg-orange-500 text-black">Urgent</option>
                    </select> 
                </div>
                <div class="flex-1">
                    <label for="assignor_user" class="block text-black text-sm mb-2">Assignor</label>
                    <select id="assignor_user" name="assignor_user" disabled
                        class="w-full px-4 py-2 text-sm rounded-lg border border-gray-300 bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select an assignor</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assignor_user', $issue->assignor_user ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->id }} : {{ $user->name }}
                                </option>
                            @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="issue_status" class="block text-black text-sm mb-2">Status</label>
                    <select disabled id="issue_status" name="issue_status" class="w-full bg-white border rounded-lg border-gray-300 px-4 py-2 text-sm leading-tight focus:outline-none appearance-none">
                        <option value="Open" {{ old('issue_status', $issue->issue_status) == 'Open' ? 'selected' : '' }}  class="bg-white-300 text-black">Open</option>
                        <option value="In-progress" {{ old('issue_status', $issue->issue_status) == 'In-progress' ? 'selected' : '' }}  class="bg-gray-300 text-black">In progress</option>
                        <option value="Closed" {{ old('issue_status', $issue->issue_status) == 'Closed' ? 'selected' : '' }}  class="bg-red-400 text-white">Closed</option>
                        <option value="Resolved" {{ old('issue_status', $issue->issue_status) == 'Resolved' ? 'selected' : '' }}  class="bg-green-400 text-white">Resolved</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
            <!-- <label for="attachment" class="block text-black text-sm mb-2">Attachment</label>
                <input 
                disabled
                type="file" 
                id="attachment" 
                name="attachment"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> -->
                
                @if($issue->attachment)
                   <div class="mt-4">
                        <p class="text-sm text-black">Attachment:</p>
                        <div class="w-full max-w-md mx-auto">
                            <img src="{{ asset('storage/' . $issue->attachment) }}" alt="Attachment Preview" class="w-full h-auto rounded-md shadow-lg">
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-4">
            <label for="duration" class="block text-black text-sm mb-2">Total duration</label>
                <input
                disabled
                type="text"
                name="total_duration"
                id="total_duration"
                value="{{ old('issue_id', $issue->total_duration) }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="solution" class="block text-black text-sm mb-2">Solution</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                disabled
                name="solution"
                id="solution"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('solution', $issue->solution) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Remark</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg border border-gray-g bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <textarea
                disabled
                name="remark"
                id="remark"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('remark', $issue->remark) }}</textarea>
            </div>


            <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
                <a href="{{ route($prefix . '.issue-list') }}"
                    class="bg-red-400 text-white px-6 py-2 rounded-md hover:bg-red-600 font-medium text-sm hover:text-white">
                    Back
                </a>
                <form action="{{ route($prefix . '.issue-edit', $issue->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button
                    type="submit"
                    class="bg-purple-400 text-white px-6 py-2 rounded-md hover:bg-purple-700 font-medium text-sm hover:text-white">
                    Edit</button>
                </form>
            </div>
            
    </div>
</x-layout>
