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
        linguana: '#55BCC9', 
      },
      fontFamily: {
        outfit: ['Outfit', 'sans-serif'],
      },
      screens: {
        '2xsm': '375px',
        'xsm': '425px',
        '3xl': '2000px',
      },
    },
  },
  plugins: [],
}