<x-layout>
    <h1>Edit Project</h1>

    <!-- Check for any validation errors -->
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.project_edit', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="project_name">Project Name</label>
            <input type="text" name="project_name" value="{{ old('project_name', $project->project_name) }}" required>
        </div>

        <div>
            <label for="contact_name">Contact Name</label>
            <input type="text" name="contact_name" value="{{ old('contact_name', $project->contact_name) }}" required>
        </div>

        <div>
            <label for="contact_email">Contact Email</label>
            <input type="email" name="contact_email" value="{{ old('contact_email', $project->contact_email) }}" required>
        </div>

        <div>
            <label for="contact_phone">Contact Phone</label>
            <input type="text" name="contact_phone" value="{{ old('contact_phone', $project->contact_phone) }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" required>
                <option value="Active" {{ $project->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $project->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit">Update Project</button>
    </form>
</x-layout>
