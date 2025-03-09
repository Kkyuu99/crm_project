<x-layout>

@include('messages')
@include('filter-scripts')
    
    <div class="flex justify-between items-center">
        <h1 class="page-title">User List</h1>

        <button id="filter-button" class="btn-2">
            Filter
        </button>
    </div>

  <div id="filter-form" class="absolute right-0 mt-2 bg-white shadow-lg p-4 rounded-md hidden w-40">
    <form action="{{ route('admin.user-list') }}" method="GET">
        <div class="flex flex-wrap">
            @foreach ($roles as $role)
                <div class="mr-4">
                    <label>
                        <input type="checkbox" name="roles[]" value="{{ $role }}" class="mr-2"
                            @if (request()->has('roles') && in_array($role, request()->input('roles'))) checked @endif>
                        {{ $role }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end mt-2">
            <button type="submit" class="apply-filter">Apply Filter</button>
        </div>
        <a href="{{ route('admin.user-list') }}" class="block text-center text-red-500 text-sm mt-2 hover:underline">
                    Remove All Filters
        </a>
    </form>
</div>

  <hr class="border-t-1 border-gray-300 mb-4" />

  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 custom-table users-table text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">No.</th>
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">Name</th>
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">Email</th>
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">Role</th>
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($users as $user)
      @php
        $userDetailRoute = route($prefix . '.user-detail', $user->id);
      @endphp
      <tr class="odd:bg-white even:bg-gray-100 odd:hover:bg-gray-100 even:hover:bg-gray-200 cursor-pointer" onclick="location.href='{{ $userDetailRoute }}'">
        <td class="custom-table-cell text-md">{{ $loop->iteration + (($users->currentPage() - 1) * $users->perPage()) }}</td>
        <td class="custom-table-cell text-md">{{$user->name}}</td>
        <td class="custom-table-cell text-md">{{$user->email}}</td>
        <td class="custom-table-cell text-md">{{$user->role}}</td>
        <td class="custom-table-cell">
          <div class="flex">
          <form action="{{ route('admin.user-edit', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button
            type="submit"
            class="btn-edit">
            Edit</button>
          </form>
          <form action="{{ route('admin.user-delete', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button
              type="submit"
              class="btn-delete">Delete</button>
          </form>
          </div>
      </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  
  <a href="{{ route('admin.user-register') }}">
  <button
    class="btn-2 mt-1 inline-block">
    Register new user
  </button>
  </a>

  <div class="my-4 flex justify-center">
    <div class="bg-white rounded-lg px-6 py-4">
      <ul class="space-x-2">
        {{ $users->links() }}
      </ul>
    </div>
  </div>
  </div>
</x-layout>

