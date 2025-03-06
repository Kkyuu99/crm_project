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

    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-custom-purple flex rounded-lg shadow-lg w-3/4 max-w-3xl overflow-hidden">
            <div class="w-full p-8">
                
                <h2 class="text-3xl font-bold text-shade-gray mb-6 text-white text-center">Forgot your password?</h2>

                
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="block text-white text-sm font-bold mb-2">Email</label>
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none"
                        >
                    </div>
                    

                    <div class="flex justify-between">
                        <div>
                            <p class="inline text-white text-sm">Go Back to </p>
                            <a href="{{ route('login') }}" class="inline text-sm text-blue-300 hover:underline italic mt-4">Login</a>
                        </div>

                        <button
                            type="submit"
                            class="justify-end bg-violet-400 text-white px-6 py-2 rounded-md hover:bg-violet-700 font-medium text-sm    ">
                            Send reset password link
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
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
                    successMessage.classList.add('hidden');
                }, 3000);
            }
        };
</script>