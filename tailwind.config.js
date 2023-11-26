/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.html", "magazin/magazin.html", "magazin/create_blog.html", "magazin/blog.html", "auth/login.php", "auth/signup.html", "dizajn/dizajn.html", "razvoj/razvoj.html", "resursi/resursi.html"],
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
