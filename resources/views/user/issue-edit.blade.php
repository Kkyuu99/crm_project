<x-layout>
    <h1 class="page-title">Issue Update Form</h1>
    <hr class="border-t-1 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-4xl mx-auto p-2">
        <form action="{{ route($prefix . '.issue-update', $issue->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="text-red-500 text-sm mt-2 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="issue_id" class="block text-black text-sm mb-2">Issue ID</label>
                <input
                required
                type="text" 
                id="issue_id" 
                name="issue_id" 
                value="{{ old('issue_id', $issue->id) }}"
                class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none"
                disabled>
            </div>
            <div class="mb-4">
                <label for="project_id" class="block text-black text-sm mb-2">Project ID</label>
                <select
                    required
                    id="project_id"
                    name="project_id"
                    onchange="updateAssignorUserDropdown()"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 input-boxes focus:outline-none"
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
                required
                type="text" 
                id="subject" 
                name="subject"
                placeholder="Enter subject of the issue" 
                value="{{ old('subject', $issue->subject) }}"
                class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-black text-sm mb-2">Description</label>
                {{-- <input type="text" id="desc" class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none"> --}}
                <textarea
                required
                name="description"
                id="description"
                cols="100"
                rows="4"
                placeholder="Enter description"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="px-4 py-2 border input-boxes focus:outline-none"
                >{{ old('description', $issue->description) }}</textarea>
            </div>
            <div class="mb-4 flex justify-between space-x-4">
                <div class="flex-1">
                    <label for="priority" class="block text-black text-sm mb-2">Priority</label>
                    <select id="priority" name="priority" class="w-full bg-white border border-gray-300 px-4 py-2 text-sm rounded-lg leading-tight focus:outline-none appearance-none">
                        <option value="Low" {{ old('priority', $issue->priority) == 'Low' ? 'selected' : '' }} class="bg-yellow-200 text-black">Low</option>
                        <option value="Medium" {{ old('priority', $issue->priority) == 'Medium' ? 'selected' : '' }} class="bg-yellow-500 text-black">Medium</option>
                        <option value="High" {{ old('priority', $issue->priority) == 'High' ? 'selected' : '' }} class="bg-orange-400 text-black">High</option>
                        <option value="Urgent" {{ old('priority', $issue->priority) == 'Urgent' ? 'selected' : '' }} class="bg-orange-500 text-black">Urgent</option>
                    </select> 
                </div>
                <!-- <div class="flex-1">
                    <label for="assignor_user" class="block text-black text-sm mb-2">Assignor</label>
                    <input
                        required
                        type="text"
                        id="assignor_user"
                        name="assignor_user"
                        value="{{ old('assignor_user', $issue->assignor_user) }}"
                        class="w-full px-4 py-2 text-sm rounded-lg border border-gray-300 input-boxes focus:outline-none"
                    >
                </div> -->
                <div class="flex-1">
                    <label for="assignor_user" class="block text-black text-sm mb-2">Assignor</label>
                    <select id="assignor_user" name="assignor_user"
                        class="w-full px-4 py-2 text-sm rounded-lg border border-gray-300 input-boxes focus:outline-none">
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
                    <select id="issue_status" name="issue_status" class="w-full bg-white border rounded-lg border-gray-300 px-4 py-2 text-sm leading-tight focus:outline-none appearance-none">
                        <option value="Open" {{ old('issue_status', $issue->issue_status) == 'Open' ? 'selected' : '' }}  class="bg-white-300 text-black">Open</option>
                        <option value="In-progress" {{ old('issue_status', $issue->issue_status) == 'In-progress' ? 'selected' : '' }}  class="input-boxes text-black">In progress</option>
                        <option value="Closed" {{ old('issue_status', $issue->issue_status) == 'Closed' ? 'selected' : '' }}  class="bg-red-400 text-white">Closed</option>
                        <option value="Resolved" {{ old('issue_status', $issue->issue_status) == 'Resolved' ? 'selected' : '' }}  class="bg-green-400 text-white">Resolved</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-black text-sm mb-2">Due Date</label>
                <input
                required
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('subject', $issue->due_date) }}"
                class="w-75 px-4 py-2 rounded-lg border input-boxes focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="attachment" class="block text-black text-sm mb-2">Attachment</label>
                <input 
                type="file" 
                id="attachment" 
                name="attachment"
                class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none">
                
                @if($issue->attachment)
                   <div class="mt-4">
                        <p class="text-sm text-gray-600">Current Attachment:</p>
                        <div class="w-full max-w-md mx-auto">
                            <img src="{{ asset('storage/' . $issue->attachment) }}" alt="Attachment Preview" class="w-full h-auto rounded-md shadow-lg">
                        </div>
                        
                        <div class="mt-2">
                            <input type="checkbox" id="remove_attachment" name="remove_attachment" value="1">
                            <label for="remove_attachment" class="text-sm text-red-500 font-semibold">Remove Attachment</label>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-4">
            <label for="duration" class="block text-black text-sm mb-2">Total duration</label>
                <input
                required
                type="text"
                name="total_duration"
                id="total_duration"
                value="{{ old('issue_id', $issue->total_duration) }}"
                placeholder="Enter total duration in hour"
                class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none"
                >
            </div>

            <div class="mb-4">
                <label for="solution" class="block text-black text-sm mb-2">Solution</label>
                <textarea
                name="solution"
                id="solution"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border input-boxes focus:outline-none"
                >{{ old('solution', $issue->solution) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Remark</label>
                <textarea
                name="remark"
                id="remark"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border input-boxes focus:outline-none"
                >{{ old('remark', $issue->remark) }}</textarea>
            </div>


            <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
            <a href="{{  route($prefix . '.issue-list')  }}"
                    class="cancel-btn">
                    Cancel
                </a>
                <button 
                   type="submit"
                   class="create-btn">
                    Update
                </button>
            </div>
        </form>
    </div>

    <script>
        var projectUsers = <?php echo json_encode($projectUsers); ?>;

        function updateAssignorUserDropdown() {
            const projectId = document.getElementById('project_id').value;
            const assignorDropdown = document.getElementById('assignor_user');
            const selectedAssignor = '{{ old("assignor_user", $issue->assignor_user) }}';

            assignorDropdown.innerHTML = '<option value="">Select an assignor</option>';

            if (projectId && projectUsers[projectId]) {
                projectUsers[projectId].forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = `${user.id} : ${user.name}`;
                    if (user.id == selectedAssignor) {
                    option.selected = true;
                }
                    assignorDropdown.appendChild(option);
                });
            }
        }
        document.addEventListener('DOMContentLoaded', (event) => {
        updateAssignorUserDropdown();
    });
    </script>
</x-layout>