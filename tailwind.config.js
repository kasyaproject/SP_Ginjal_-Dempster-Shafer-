import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            backgroundImage: {
                cover: "url('{{ asset('img/background-form.jpg') }}')",
            },
            colors: {
                transparent: "transparent",
                current: "currentColor",
                primary: "#35A29F",
                secondary: "#0B666A",
            },
            screens: {
                tablet: "640px",
                laptop: "1024px",
                desktop: "1280px",
            },
        },
    },

    plugins: [
        require("flowbite/plugin"),
        require("flowbite/plugin")({
            datatables: true,
        }),
        require("flowbite/plugin")({
            charts: true,
        }),
        require("preline/plugin"),
        forms,
    ],
};
