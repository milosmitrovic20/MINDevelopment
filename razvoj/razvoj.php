<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Развој</title>
    <link rel="icon" href="../images/logo.svg" type="image/icon">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body style="background-image: url('../images/tamnosvetlo.svg');">
    <header>
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
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
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
                            <a href="" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-accent lg:p-0" aria-current="page">Развој</a>
                        </li>
                        <li>
                            <a href="../dizajn/dizajn.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Дизајн</a>
                        </li>
                        <li>
                            <a href="../dizajn/dizajn.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Ресурси</a>
                        </li>
                        <li>
                            <a href="../magazin/magazin.php" class="block py-2 pr-4 pl-3 text-text transition duration-300 transform hover:scale-110 lg:border-0 lg:p-0" >Магазин</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="h-screen sm:h-[75vh] flex flex-col items-center text-center justify-start mb-16">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-white">Развој</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Сервис који омогућава конверзију латинице у ћирилицу</p>
        </div> 
        <div class="flex space-y-10 sm:space-y-0 p-4 sm:px-0 space-x-0 sm:space-x-10 sm:flex-row max-w-screen-xl items-start justify-center mx-auto w-full flex-col">
            <textarea type="text" class="p-4 bg-secondary resize-none w-full h-64 sm:w-2/5 justify-start items-start text-justify text-text placeholder:text-gray-400 border border-accent rounded-md" id="latinicaInput" placeholder="Унесите латиницу овде"></textarea>
            <div class="flex flex-col w-full pt-0 sm:pt-24 sm:w-[10%]">
                <button class="bg-primary hover:bg-primary-hover text-secondary font-medium rounded-lg text-base px-4 lg:px-5 py-2 lg:py-2.5 mr-2" id="konvertujDugme">Конвертуј</button>
                <button class="bg-transparent text-primary font-medium rounded-lg text-base px-4 lg:px-5 py-2 lg:py-2.5 mr-2" id="obrisiDugme">Обриши</button>
            </div>

            <div class="flex flex-col w-full h-full sm:w-2/5 items-end space-y-4">
                <textarea type="text" class="p-4 w-full bg-secondary resize-none h-64 justify-end text-justify text-text placeholder:text-gray-400 border border-accent rounded-md" id="cirilicaOutput" placeholder="Ћирилица ће се појавити овде" readonly></textarea>
                <button class="bg-primary w-1/3 sm:w-1/4 hover:bg-primary-hover text-secondary font-medium rounded-lg text-base px-4 lg:px-5 py-2 lg:py-2.5 mr-2" id="kopirajDugme">Копирај</button>
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
    <script src="razvoj.js"></script>
</body>
</html>
