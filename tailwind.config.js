/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['"Montserrat Alternates"', 'Arial', 'sans-serif'],
        },
        colors: {
            'primary': {
                600: '#227799',
                400: '#6cc4e7',
            },
        },
    },
  },
  plugins: [],
}
