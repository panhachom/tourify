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
        fourth: '#343434',
        onThird: 'rgb(0, 171, 179,0.2)',
        onPrimary: 'rgba(202, 202, 202, 0.2)',
        footer: '#ffc273',
        btn2: '#3F9FD5',
        btn3: '#D53F51',
        btn4: '#86C106',


      },
      fontFamily: {
        fontPoppins: ['Poppins']
      }
    },
    plugins: [],
}
}
