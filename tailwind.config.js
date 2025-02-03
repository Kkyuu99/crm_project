/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
<<<<<<< HEAD
        extend: {
            colors: {
                'gray-g': '#EEEEEE',
                'custom-purple': '#745CC9',
                'soft-purple': '#AB96FA',
                'blue-b': '#17147B',
                ''
            },
        },
=======
      extend: {
        colors: {
          'custom-purple': '#745CC9',
          'soft-purple': '#AB96FA',
      }
      },
>>>>>>> 480cedcd2aa14cde844ea1487ed77f6a20afcf79
    },
    plugins: [],
  }
