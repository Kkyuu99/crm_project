import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'gray-g': '#EEEEEE',
                'custom-purple': '#745CC9',
                'soft-purple': '#AB96FA',
                'blue-b': '#17147B',
                ''
            },
        },
    },
    plugins: [],
};
