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
                '130': '32.5rem',
                '144': '36rem',
                '120': '30rem',
                '118': '29.5rem',
                '110': '27.5rem',
                '111': '27.75rem',
                '112': '28rem',
                '113': '28.25rem',
                '114': '28.5rem',
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
