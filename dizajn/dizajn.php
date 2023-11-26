<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дизајн</title>
    <link rel="icon" href="../images/logo.svg" type="image/icon">
    <link href="../dist/output.css" rel="stylesheet">
    <link href="../dist/output1.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../jquery.fontselect.js"></script>
</head>
<body class="bg-background">
    <header>
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="../index.php" class="flex items-center">
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
                            <a href="./dizajn.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-accent lg:p-0" aria-current="page">Дизајн</a>
                        </li>
                        <li>
                            <a href="../resursi/resursi.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Ресурси</a>
                        </li>
                        <li>
                            <a href="../magazin/magazin.php" class="block py-2 pr-4 pl-3 text-text transition duration-300 transform hover:scale-110 lg:border-0 lg:p-0">Магазин</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section>
            <div class=" mx-auto max-w-screen-md text-center mb-8 px-4 sm:px-0">
                <h2 class="mb-4 mt-12 text-3xl lg:text-4xl tracking-tight font-extrabold text-white">Дизајн</h2>
                <h3 class="mb-4 font-light text-gray-500 sm:text-xl dark:text-gray-400">Изабери фонт, тестирај га и искористи при креирању свог веб-портала на ћирилици</h3>
                <input id="font" type="text" />
            </div>
    </section>
    

    <section class="h-screen z-10" style="background-image: url('../images/tamnosvetlo.svg');">
        <div class="rounded-lg mx-auto max-w-screen-xl overflow-y-auto p-8">
            <div class="mx-auto max-w-screen-xl mb-4 text-center lg:text-center">
                <p class="mt-2 mb-4 text-3xl font-bold tracking-tight text-text sm:text-4xl">Ћирилица - Више Од Пуког Писања</p>
                <p class="mt-6 text-lg leading-8 text-gray-500">Ћирилица, сложени скуп карактера који се користи за писање многих језика, укључујући српски, руски, бугарски, и многе друге, често се перципира само као средство за писање. У наставку ћемо истражити неколико занимљивих начина како се ћирилица користи широм света.
                </p>
            </div>
                <div class="mb-4 mt-8 flex flex-col sm:flex-row w-full max-w-screen-xl space-y-4 sm:space-y-0 space-x-0 sm:space-x-4 mx-auto justify-between items-center">
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">1.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Уметност и Калиграфија</h2>
                        <p class="text-gray-500 text-sm mb-4">Ћирилица није само функционална, већ је и естетски лепа. Уметници и калиграфи често користе ћирилицу као инспирацију за своје радове. Њена крупна слова, шарени облици и потези често се користе како би се створила дела која су истовремено и визуално задивљујућа и дубоко симболична.
                        </p>
                    </div>
                
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">2.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Дигитални Дизајн</h2>
                        <p class="text-gray-500 text-sm mb-4">У ери дигиталног дизајна, ћирилица је постала незаобилазан део креације логотипа, wеб страница и апликација. Њени јединствени облици омогућавају дизајнерима да стварају препознатљиве брендове и корисничке интерфејсе који се истичу.
                        </p>
                    </div>
                
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">3.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Графити и Стреет Арт</h2>
                        <p class="text-gray-500 text-sm mb-4">Уметници уличне уметности широм Балкана користе ћирилицу како би изразили своје поруке на зидовима и јавним површинама. Овај спој традиционалног писма и савремене уметности често има снажан друштвени и политички контекст.
                        </p>
                    </div>
                </div>
                <div class="mb-8 flex flex-col sm:flex-row w-full max-w-screen-xl space-x-4 mx-auto justify-between items-center">
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">4.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Креативност Ћириличног Писма</h2>
                        <p class="text-gray-500 text-sm mb-4">Ћирилица, са својим елегантним и флуидним формама, служи као извор инспирације за многе уметнике. Њени уникатни ликови и грациозни потези омогућавају стварање уметничких дела која су не само визуелно привлачна, већ и богата културним и историјским значењем.</p>
                        </p>
                    </div>
    
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">5.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Књижевност и Поезија</h2>
                        <p class="text-gray-500 text-sm mb-4">Ћирилица је дом многим великим књижевним делима и песницима. Њена елеганција доприноси дубини и лепоти речи. Песници попут Сергеја Јесењина и Ива Андрића користили су ћирилицу како би створили своје ремек-дела.
                        </p>
                    </div>
                
                    <div class=" p-4 w-full sm:w-1/3 rounded-lg z-10">
                        <h2 class="text-accent text-xl font-bold mb-2">6.</h2>
                        <h2 class="text-text text-xl font-bold mb-2">Игрице и Фонтови</h2>
                        <p class="text-gray-500 text-sm mb-4">Ћирилични фонтови су важан део света видео игара и дизајна интерфејса. Они омогућавају локализацију игара на ћирилици и пружају боље корисничко искуство за руско-српско говорно подручје.
                        </p>
                    </div>
                
    
                </div>
            </div>
        </div>

    </section>

    <section class="h-screen sm:hidden rotate-180" style="background-image: url('../images/tamnosvetlo.svg');">

    </section>

    <section class="h-screen sm:hidden -z-10"  style="background-image: url('../images/tamnosvetlo.svg');">

    </section>

    

    <footer class="bg-background ">
        <div class="mx-auto w-full max-w-screen-xl pt-8">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-text uppercase">Навигација</h2>
                <ul class="text-text font-medium">
                    <li class="mb-4">
                        <a href="../razvoj/razvoj.html" class=" hover:underline">Развој</a>
                    </li>
                    <li class="mb-4">
                        <a href="../dizajn/dizajn.html" class="hover:underline">Дизајн</a>
                    </li>
                    <li class="mb-4">
                        <a href="../resursi/resursi.html" class="hover:underline">Ресурси</a>
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
                        <a href="../magazin/blog.html" class="hover:underline">Блог</a>
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
            <span class="text-sm text-gray-500">© 2023 <a href="">Ћирилко™</a>. Сва права задржана.
            </span>
        </div>
    </footer>

    <script src="dizajn.js"></script>
    <script>
        function toggleMenu() {
            const navbarCta = document.getElementById('mobile-menu-2');
            navbarCta.classList.toggle('hidden');
        }
    </script>
</body>
</html>
