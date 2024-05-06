/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['"Montserrat Alternates"', 'Arial', 'sans-serif'],
        },
        colors: {
            'primary': {
                600: '#227799',
                400: '#52acd0',
            },
        },
    },
  },
  plugins: [],
}
