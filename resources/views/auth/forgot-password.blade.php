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
                        'shade-gray':'#505050',
                    }
                }
            }
        }
    </script>
    <title>Forgot password</title>
</head>
<body>
    <section class="bg-custom-purple min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 flex rounded-lg shadow-lg w-3/4 max-w-4xl overflow-hidden">
            <div class="w-full p-8">
                <!-- Forgot your password outside the form -->
                <h2 class="text-3xl font-bold text-shade-gray mb-6 text-center">Forgot your password?</h2>

                <!-- Form below the heading -->
                <form>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold mb-2">Email</label>
                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none"
                        >
                    </div>
                    <p class="inline text-shade-gray">Go Back to </p>
                    <a href="./crmloginUser.html" class="inline text-blue-400 hover:underline text-sm mt-4">Login</a>

                <button
                type="submit"
                class="bg-soft-purple px-4 py-2 text-white rounded-lg hover:bg-purple-500 transition  w-24 ml-24">
                Next</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
