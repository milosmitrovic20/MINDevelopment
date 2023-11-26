<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресурси</title>
    <link rel="icon" href="../images/logo.svg" type="image/icon">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
    <header class="bg-background">
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="" class="flex items-center">
                    <img src="../images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Ћирилко лого" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Ћирилко</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <?php
                    if(isset($_SESSION['userID'])) {
                    ?>
                        <form action="../DB/logout.php" method="post">
                            <button type="submit" name="logout" class="text-primary bg-transparent hover:text-primary-hover font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Одјави се</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <a href="../auth/login.php" class="text-secondary bg-primary hover:bg-primary-hover font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Пријави се</a>
                    <?php
                    }
                    ?> 
                    <button onclick="toggleMenu()" data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Отвори главни мени</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="../index.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text rounded lg:p-0">Почетна</a>
                        </li>
                        <li>
                            <a href="../razvoj/razvoj.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Развој</a>
                        </li>
                        <li>
                            <a href="../dizajn/dizajn.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Дизајн</a>
                        </li>
                        <li>
                            <a href="" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-accent lg:p-0" aria-current="page">Ресурси</a>
                        </li>
                        <li>
                            <a href="../magazin/magazin.php" class="block py-2 pr-4 pl-3 text-text transition duration-300 transform hover:scale-110 lg:border-0 lg:p-0" >Магазин</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section style="background-image: url('../images/tamnosvetlo.svg');">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Корисни линкови</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">На овој страници можеш да пронађеш неке корисне и занимљиве информације и садржаје везане за ћирилицу </p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <a href="https://www.rnids.rs/" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">РНИДС</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://www.rnids.rs/</p>                    
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                    </div>
                    <a href="https://www.isj.sanu.ac.rs/" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">Институт за српски језик САНУ</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://www.isj.sanu.ac.rs/</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>                    
                    </div>
                    <a href="https://www.politika.rs/" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">Политика</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://www.politika.rs/</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                    </div>
                    <a href="https://cirilizator.weebly.com/" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">Ћирилизатор</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://cirilizator.weebly.com/</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                    </div>
                    <a href="https://nardus.mpn.gov.rs/?locale-attribute=sr" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">НаРДуС</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://nardus.mpn.gov.rs/?locale-attribute=sr</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-accent lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-text lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <a href="https://stickers.viber.com/pages/custom-sticker-packs/11ee77cb2b4dbea4b59cff474b635a44435cad9ec3dc5457" class="no-underline text-inherit">
                        <h3 class="mb-2 text-xl font-bold dark:text-white hover:text-primary-hover">Стикери</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400">https://stickers.viber.com/pages/custom-sticker-packs/11ee77cb2b4dbea4b59cff474b635a44435cad9ec3dc5457</p>
                </div>
            </div>
        </div>
      </section>

      <footer class="bg-background ">
        <div class="mx-auto w-full max-w-screen-xl pt-8">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-text uppercase">Навигација</h2>
                <ul class="text-text font-medium">
                    <li class="mb-4">
                        <a href="../razvoj/razvoj.php" class=" hover:underline">Развој</a>
                    </li>
                    <li class="mb-4">
                        <a href="../dizajn/dizajn.php" class="hover:underline">Дизајн</a>
                    </li>
                    <li class="mb-4">
                        <a href="../resursi/resursi.php" class="hover:underline">Ресурси</a>
                    </li>
                    <li class="mb-4">
                        <a href="../magazin/magazin.php" class="hover:underline">Магазин</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold uppercase text-text">Корисни линкови</h2>
                <ul class="text-text font-medium">
                    <li class="mb-4">
                        <a href="https://discord.gg/PWQThHfP" class="hover:underline">Дискорд сервер</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://chat.whatsapp.com/EmDasBZ6BOx6eSh7O85lIf" class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="mb-4">
                        <a href="../magazin/blog.php" class="hover:underline">Блог</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-text uppercase">Информације</h2>
                <ul class="text-text font-medium">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Политика приватности</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Лиценца</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Услови коришћења</a>
                    </li>
                </ul>
            </div>
            <div>

            </div>
        </div>
        <div class="bg-secondary h-0.5 w-full"></div>
        <div class="px-4 py-6 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500">© 2023 <a href="../index.php">Ћирилко™</a>. Сва права задржана.
            </span>
        </div>
    </footer>
    <script>
        function toggleMenu() {
            const navbarCta = document.getElementById('mobile-menu-2');
            navbarCta.classList.toggle('hidden');
        }
    </script>
</body>
</html>