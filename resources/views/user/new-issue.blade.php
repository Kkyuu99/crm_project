<x-layout>
    <h1 class="page-title">Issue Create Form</h1>
    <hr class="border-t-1 border-gray-300 my-4" />
    <div class="w-full mb-5 max-w-4xl mx-auto p-2">
        <form action="{{ route($prefix . '.issue-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <label for="project_id" class="block text-black text-sm mb-2">Project</label>
                <select
                    required
                    id="project_id"
                    name="project_id"
                    onchange="updateAssignorUserDropdown()"
                    class="w-full px-4 py-2 rounded-lg border input-boxes focus:outline-none">
                    <option value="">Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->id }} : {{ $project->project_name }}</option>
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
                class="w-full px-4 py-2 rounded-lg input-boxes focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-black text-sm mb-2">Description</label>
                {{-- <input type="text" id="desc" class="w-full px-4 py-2 rounded-lg input-boxes focus:outline-none"> --}}
                <textarea
                require
                name="description"
                name="description"
                id="description"
                cols="100"
                rows="4"
                placeholder="Enter description"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="px-4 py-2 border input-boxes focus:outline-none"
                ></textarea>
            </div>

            <div class="mb-6 flex justify-between space-x-4">
                <div class="flex-1">
                    <label for="priority" class="block text-black text-sm mb-2">Priority</label>
                    <select id="priority" name="priority" class="w-full bg-white border border-gray-300 px-4 py-2 text-sm rounded-lg leading-tight focus:outline-none">
                        <option value="Low" class="bg-yellow-200 text-black">Low</option>
                        <option value="Medium" class="bg-yellow-500 text-black">Medium</option>
                        <option value="High" class="bg-orange-400 text-black">High</option>
                        <option value="Urgent" class="bg-orange-500 text-black">Urgent</option>
                    </select>
                </div>
                
                <div class="flex-1">
                    <label for="assignor_user" class="block text-black text-sm mb-2">Assignor</label>
                    <select id="assignor_user" name="assignor_user"
                        class="w-full px-4 py-2 text-sm rounded-lg border input-boxes focus:outline-none">
                        <option value="">Select an assignor</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->id }} : {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1">
                    <label for="issue_status" class="block text-black text-sm mb-2">Status</label>
                    <select id="issue_status" name="issue_status" class="w-full bg-white border rounded-lg border-gray-300 px-4 py-2 text-sm leading-tight focus:outline-none">
                        <option value="Open" class="bg-white-300 text-black">Open</option>
                        <option value="In-progress" class="input-boxes text-black">In progress</option>
                        <option value="Closed" class="bg-red-400 text-white">Closed</option>
                        <option value="Pending" class="bg-green-400 text-white">Resolved</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-black text-sm mb-2">Due Date</label>
                <input
                required
                type="date"
                id="du_date"
                name="due_date"
                class="w-75 px-4 py-2 rounded-lg input-boxes focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="attachment" class="block text-black text-sm mb-2">Attachment</label>
                <input
                type="file"
                id="attachment"
                type="file"
                id="attachment"
                name="attachment"
                style="width: 100%; padding: 12px; height: auto;" 
                placeholder="JPG, PNG, PDF only"
                class="w-full px-4 py-2 rounded-lg input-boxes focus:outline-none">
            </div>

            <div class="mb-4">
            <label for="duration" class="block text-black text-sm mb-2">Total duration</label>
                <input
                required
                type="number"
                name="total_duration"
                id="total_duration"
                placeholder="Enter total duration in hour"
                class="w-full px-4 py-2 rounded-lg input-boxes focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="solution" class="block text-black text-sm mb-2">Solution</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg input-boxes focus:outline-none"> --}}
                <textarea
                name="solution"
                id="solution"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border input-boxes focus:outline-none"
                ></textarea>
            </div>

            <div class="mb-4">
                <label for="remark" class="block text-black text-sm mb-2">Remark</label>
                {{-- <input type="text" id="desc" class="w-full px-24 py-12 rounded-lg input-boxes focus:outline-none"> --}}
                <textarea
                name="remark"
                id="remark"
                cols="100"
                rows="4"
                style="resize: height; overflow: hidden; width:100%; height:100%; border-radius:8px; max-width:100%;"
                class="p-2 border input-boxes focus:outline-none"
                ></textarea>
            </div>

            <div class="flex flex-row-reverse  space-x-1 space-x-reverse">
                <a href="{{  route($prefix . '.issue-list')  }}"
                    class="cancel-btn">
                    Cancel
                </a>
                <button
                   type="submit"
                   class="create-btn">
                    Save
                </button>
            </div>
        </form>
    </div>
    
    <script>
        
        var projectUsers = <?php echo json_encode($projectUsers); ?>;

        function updateAssignorUserDropdown() {
            const projectId = document.getElementById('project_id').value;
            const assignorDropdown = document.getElementById('assignor_user');

            assignorDropdown.innerHTML = '<option value="">Select an assignor</option>';

            if (projectId && projectUsers[projectId]) {
                projectUsers[projectId].forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = user.name;
                    assignorDropdown.appendChild(option);
                });
            }
        }
    </script>
</x-layout>

