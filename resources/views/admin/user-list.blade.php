<x-layout>
  <h1 class="text-2xl font-bold text-black my-4 text-center">Users</h1>
  <hr class="border-t-1 border-gray-300 my-4" />
  <!-- Table Wrapper with Horizontal and Vertical Scroll -->
  <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-2 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
    <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-center">
        <thead>
        <tr class="bg-white text-blue-b">
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">No.</th>
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Name</th>
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">user ID</th>
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Email</th>
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Role</th>
          <th class="border border-gray-300 px-6 py-2 text-xl text-center bg-gray-100 text-gray-500" style="font-size: 16px;">Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($users as $user)
      @php
        $prefix = Auth::user()->role === 'admin' ? 'admin' : 'user';
        $userDetailRoute = route($prefix . '.user-detail', $user->id);
      @endphp
      <tr class="hover:bg-gray-100 cursor-pointer" onclick="location.href='{{ $userDetailRoute }}'">
        <td class="border border-gray-300 px-8 py-2 text-md">{{ $loop->iteration + (($users->currentPage() - 1) * $users->perPage()) }}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$user->name}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$user->id}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$user->email}}</td>
        <td class="border border-gray-300 px-8 py-2 text-md">{{$user->role}}</td>
        <td class="flex justify-center px-4 py-7">
          <form action="{{ route('admin.user-edit', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <button
            type="submit"
            class="bg-yellow-400 px-4 py-2 text-center hover:bg-yellow-600 hover:text-white">
            Edit</button>
          </form>
          <form action="{{ route('admin.user-delete', $user->name) }}" method="POST">
              @csrf
              @method('DELETE')
              <button
              type="submit"
              class="bg-red-400 px-4 py-2 mx-2 text-black hover:bg-red-600 hover:text-white">Delete</button>
          </form>
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