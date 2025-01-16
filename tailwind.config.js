import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'Jesper': '#4A5468',
                'Jesper_blue': '#A0ABC0',
                'apple_button_blue': '#007AFF',
                'apple_button_blue_hover': '#006FE6',
                'system_gray': '#C1C0C0',
                'system_gray_light': '#D9D9D9',
                'Jesper_light': '#717D96',
                'placeholder': '#2D3648',
            },
            width: {
                '128': '32rem',
              },
            height:{
                '128': '32rem',
                '144': '36rem',
            },
            fontSize: {
                sm: '0.8rem',
                base: '1rem',
                xl: '1.25rem',
                '2xl': '1.563rem',
                '3xl': '1.953rem',
                '4xl': '2.441rem',
                '10xl': '7rem',
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage:{
                'search': "url('/resources/css/assets/search_icon.svg')"
            },
        },
    },

    plugins: [forms],
};
