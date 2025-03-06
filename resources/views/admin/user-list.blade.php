<x-layout>

  @if(session('success'))
        <div id="success-message" class="popup-message bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div id="error-message" class="popup-message bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold my-4 text-center flex-grow">User List</h1>

        <button id="filter-button" class="bg-violet-400 text-white px-6 py-2 mr-4 rounded-md hover:bg-violet-500 font-medium text-sm">
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
            <button type="submit" class="bg-gray-200 text-gray-400 px-6 py-2 rounded-md hover:bg-gray-300 font-medium text-sm">Apply Filter</button>
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
          <th class="custom-table-column border border-gray-300 text-md" style="font-size: 16px;">user ID</th>
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
      <tr class="hover:bg-gray-100 cursor-pointer" onclick="location.href='{{ $userDetailRoute }}'">
        <td class="custom-table-cell text-md">{{ $loop->iteration + (($users->currentPage() - 1) * $users->perPage()) }}</td>
        <td class="custom-table-cell text-md">{{$user->name}}</td>
        <td class="custom-table-cell text-md">{{$user->id}}</td>
        <td class="custom-table-cell text-md">{{$user->email}}</td>
        <td class="custom-table-cell text-md">{{$user->role}}</td>
        <td class="custom-table-cell">
          <div class="flex">
          <form action="{{ route('admin.user-edit', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button
            type="submit"
            class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">
            Edit</button>
          </form>
          <form action="{{ route('admin.user-delete', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button
              type="submit"
              class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
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
    class="flex items-center justify-start text-white bg-violet-400 px-6 py-2 rounded-lg hover:bg-violet-500 font-medium text-sm mx-5"
    >
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

<script>
        window.onload = function() {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            if (successMessage) {
                
                setTimeout(function() {
                    successMessage.classList.add('show');
                }, 100);

                setTimeout(function() {
                    successMessage.classList.add('hidden');
                }, 3000);
            }

            if (errorMessage) {

                setTimeout(function() {
                    errorMessage.classList.add('show');
                }, 100);
                
                setTimeout(function() {
                    errorMessage.classList.add('hidden');
                }, 3000);
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
        const filterButton = document.getElementById('filter-button');
        const filterForm = document.getElementById('filter-form');

        if (filterButton && filterForm) {
            filterButton.addEventListener('click', function() {
                filterForm.classList.toggle('hidden');
            });
        }
    });
</script>

