<x-layout>
    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-custom-purple flex rounded-lg shadow-lg w-3/4 max-w-3xl overflow-hidden">
            <div class="w-full p-8">
                <h2 class="text-3xl text-white font-bold text-shade-gray mb-6 text-center">Reset Password</h2>
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('password.update') }}">
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

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="block text-white text-sm font-bold mb-2">{{ ('Email') }}</label>

                            <div class="col-md-6">
                                <input readonly id="email" type="email" class="w-96 px-4 py-2 rounded-lg focus:outline-none" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="block text-white text-sm font-bold mb-2">{{ ('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="w-96 px-4 py-2 rounded-lg focus:outline-none" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="block text-white text-sm font-bold mb-2">{{ ('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="w-96 px-4 py-2 rounded-lg focus:outline-none" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-violet-400 text-white px-6 py-1 rounded-md hover:bg-violet-700 font-medium text-sm">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</x-layout>
