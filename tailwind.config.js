const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                clifford: '#da373d',
                site_color_hover: '#FBB920',
                site_color_theme: "#FF00FF",
                founder_img_bg: '#E1DCCC',
                table_thead_bg_color: '#000000',

            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};