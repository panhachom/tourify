/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#D5603F',
        secondary: '#FFF7F5',
        third: '#00ABB3',
        fourth: '#343434'
      },
      fontFamily: {
        fontPoppins: ['Poppins']
      }
    },
  },
  plugins: [],
}

