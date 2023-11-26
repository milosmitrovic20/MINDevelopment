/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.php", "magazin/magazin.php", "magazin/create_blog.php", "magazin/blog.php", "magazin/blog.js", "auth/login.php", "auth/signup.html", "dizajn/dizajn.php", "razvoj/razvoj.php", "resursi/resursi.php"],
  theme: {
    extend: {
      colors: {
        'text': '#fcfcfd',
        'background': '#061d28',
        'primary': '#ef8e61',
        'secondary': '#092e3e',
        'accent': '#13a4e7',
        'primary-hover': '#ed7a45',
      },
      fontFamily: {
        'andikaRegular': ['AndikaRegular', 'sans-serif'],
      }
    },
  },
  plugins: [
    require('flowbite-typography'),
    require('@tailwindcss/line-clamp'),
  ],
}
