<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-purple': '#745CC9',
                        'soft-purple': '#AB96FA',
                    }
                }
            }
        }
    </script>
    <title>Login Screen</title>
</head>
<body>
    <section class="bg-purple-500 min-h-screen flex items-center justify-center">
        <div class="bg-white flex flex-col rounded-lg shadow-lg w-full max-w-sm p-6">
            <h1 class="text-2xl font-bold text-black mb-4 text-center">Login</h1>
            <form>
                <div class="mb-3">
                    <label for="email" class="block text-black text-sm font-bold mb-1">Email</label>
                    <input
                        type="email"
                        id="email"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"

                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-black text-sm font-bold mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                        
                        required>
                </div>
                <div class="flex items-center justify-end mb-4">
                    <a href="#" class="text-black hover:underline text-xs">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <button
                        type="submit"
                        class="bg-custom-purple text-black px-6 py-2 rounded-md hover:bg-neutral-100 font-medium focus:outline-none focus:ring-2 focus:ring-purple-400 text-sm">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>