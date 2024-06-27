/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        mono: ['Open Sans', 'sans-serif'],
      },
      width: {
        'logo' : '3.9rem',
      },
      height: {
        'logo' : '3.9rem',
      },
      display: {
        'custom-none': 'none',
      },
      
    },
  },
  plugins: [],
}

