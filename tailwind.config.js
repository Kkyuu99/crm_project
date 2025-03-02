import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                'gray-g': '#EEEEEE',
                'custom-purple': '#745CC9',
                'soft-purple': '#AB96FA',
                'blue-b': '#17147B',
            
            },
        },
      extend: {
        colors: {
          'custom-purple': '#745CC9',
          'soft-purple': '#AB96FA',
      }
      },
    },
    plugins: [],
  }
