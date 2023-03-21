/** @type {import('tailwindcss').Config} */
/** @type {import('rippleui').Config} */
module.exports = {
    mode: "jit",
    purge: ["./resources/**/*.blade.php", "./resources/**/*.vue"],
    content: ["./resources/**/*.blade.php", "./resources/**/*.vue"],
    darkMode: false,
    theme: {
        extend: {},
        screens: {
            xs: "320px",
            // => @media (min-width: 320px) { ... }

            sm: "640px",
            // => @media (min-width: 640px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require("rippleui"),require('@tailwindcss/typography'),],
    rippleui: {
        themes: [
            {
                themeName: "light",
                colorScheme: "light",
                prefersColorScheme: true,
                colors: {
                    primary: "#235264",
                    backgroundPrimary: "#FFFFFF",
                },
            },
            {
                themeName: "dark",
                colorScheme: "dark",
                prefersColorScheme: false,
                colors: {
                    primary: "#573242",
                    backgroundPrimary: "#1a1a1a",
                },
            },
        ],
    },
};
