/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'custom-purple': '#745CC9',
          'soft-purple': '#AB96FA',
      }
      },
    },
    plugins: [require('@tailwindcss/line-clamp')],
  }
