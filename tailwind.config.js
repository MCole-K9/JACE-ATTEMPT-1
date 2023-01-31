/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  purge: [
      './resources/**/*.blade.php',
      './resources/**/*.vue',
  ],
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.vue',
  ],
  darkMode: false,
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
