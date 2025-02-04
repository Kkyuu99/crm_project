<x-layout>
    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
        <!-- Login container -->
        <div class="bg-custom-purple flex rounded-lg shadow-lg w-3/4 max-w-4xl overflow-hidden">
            <!-- Left: Form -->
            <div class="w-1/2 p-8">
                <h2 class="text-3xl font-bold text-white mb-6 text-center">Login Form</h2>
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <label 
                        for="email" 
                        class="block text-white text-sm font-bold mb-2">
                           Email</label>
                        <input 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="Enter your email"
                        class="w-full px-4 py-2 rounded-lg focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label 
                        for="password" 
                        class="block text-white text-sm font-bold mb-2">
                        Password</label>
                        <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-4 py-2 rounded-lg focus:outline-none">
                    </div>

                    {{-- <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between mb-4 ">
                        <label class="flex items-center text-white text-sm">
                            <input type="checkbox" class="mr-2 rounded focus:outline-none">
                            Remember Me
                        </label>
                        <a href="#" class="text-purple-200 hover:underline text-sm">Forgot Password?</a>
                    </div> --}}
                    <div class="w-32 mx-auto">
                        
                        <button
                            type="submit"
                            class="bg-violet-400 text-white px-6 py-1 rounded-md hover:bg-purple-500 font-medium text-sm">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <!-- Right: Form-->
            <div class="bg-violet-400 w-1/2 flex flex-col items-center justify-center text-center p-8">
                <h2 class="text-3xl font-bold text-white mb-4">Welcome Back!</h2>
                <p class="text-white text-lg font-medium">
                    To keep connected with us, please log in with your personal information.
                </p>
            </div>

    </section>
</x-layout>