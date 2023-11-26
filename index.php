<!DOCTYPE html>
<html lang="en">
<head class="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Почетна</title>
    <link rel="icon" href="images/logo.svg" type="image/icon">
    <link href="dist/output.css" rel="stylesheet">
</head>
<body class="">
    <header class="bg-background">
        <nav class="border-gray-200 px-4 lg:px-6 py-3">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="" class="flex items-center">
                    <img src="images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Ћирилко лого" />
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
                            <a href="" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-accent rounded lg:p-0" aria-current="page">Почетна</a>
                        </li>
                        <li>
                            <a href="razvoj/razvoj.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Развој</a>
                        </li>
                        <li>
                            <a href="dizajn/dizajn.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Дизајн</a>
                        </li>
                        <li>
                            <a href="resursi/resursi.php" class="block py-2 pr-4 pl-3 transition duration-300 transform hover:scale-110 text-text lg:p-0">Ресурси</a>
                        </li>
                        <li>
                            <a href="magazin/magazin.php" class="block py-2 pr-4 pl-3 text-text transition duration-300 transform hover:scale-110 lg:border-0 lg:p-0">Магазин</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="relative bg-no-repeat py-16"  style="background-image: url('images/tamnosvetlo.svg');">
        <div class="max-w-screen-xl mx-auto flex-col-reverse sm:flex-row-reverse flex items-center sm:p-0" >     
            <div class="h-full w-3/4 sm:w-3/5">
                <img src="images/transparent.svg" alt="Hero Image" class="object-cover">
            </div>
            <div class="z-10 flex-1 sm:translate-x-10 sm:text-left text-center mt-4 sm:mt-0 sm:w-10">
                <h1 class="text-4xl font-extrabold mb-4 md:text-5xl lg:text-6xl text-text">Ћирилко</h1>
                <p class="mb-6 text-lg text-gray-500">Веб-портал који на једном месту пружа ресурсе, материјале, савете и трикове за употребу ћирилице у дигиталном окружењу.</p>
            </div>
            <div class="bg-background absolute top-0 right-0 w-full h-full opacity-30"></div>
        </div>
    </section>
    
        
    <section class="bg-no-repeat py-32 bg-cover" style="background-image: url('images/stacked-waves-haikei svetlo tamno.svg');">
        <div class="grid grid-rows-2 gap-4 max-w-screen-xl mx-auto">
            <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-full md:w-3/4 p-4">
                    <div class="bg-secondary rounded-lg shadow-md hover:shadow-accent text-text p-6 flex flex-col items-center">
                        <img src="images/ikone/2olovke.svg" alt="Icon 3" class="h-32 w-32 p-4">
                        <h3 class="mt-4 font-semibold text-xl">Развој</h3>
                    </div>
                </div>
                <div class="w-full md:w-1/4 p-4 md:pl-8">
                    <div class="shadow-md hover:shadow-accent rounded-lg text-white p-6 flex flex-col items-center bg-secondary" >
                        <img src="images/ikone/blog.svg" alt="Icon 3" class="h-32 w-32 p-4">
                        <h3 class="mt-4 font-semibold text-xl">Блог</h3>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-full md:w-1/4 p-4 md:pl-8">
                    <div class="bg-gradient-to-tr bg-secondary shadow-md hover:shadow-accent to-#ed7a45 from-#ef8e61 rounded-lg text-white p-6 flex flex-col items-center">
                        <img src="images/ikone/resursi.svg" alt="Icon 3" class="h-32 w-32 p-4">
                        <h3 class="mt-4 font-semibold text-xl">Ресурси</h3>
                    </div>
                </div>
                <div class="w-full md:w-3/4 p-4">
                    <div class=" rounded-lg shadow-md hover:shadow-accent text-white p-6 flex flex-col items-center bg-secondary" >
                        <img src="images/ikone/peroiknjiga.svg" alt="Icon 3" class="h-32 w-32 p-4">
                        <h3 class="mt-4 font-semibold text-xl">Дизајн</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="relative bg-no-repeat bg-cover bg-center h-[50vh] flex items-center justify-center" style="background-image: url('images/planina.svg');">
        <div class="max-w-screen-xl mx-auto flex flex-col sm:flex-row text-center sm:text-left justify-center items-center space-y-10 sm:space-y-0 sm:space-x-10 z-10">
            <div class="flex flex-col text-center items-center justify-center">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold mb-6 text-text leading-tight">Придружи се!</h1>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-400 leading-normal">Постани члан једне од друштвених заједница</p>
                <ul class="flex flex-row mt-12 space-x-4  lg:space-x-6 mx-auto items-center">

                    <li class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:scale-105" fill="#fcfcfd" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </li>

                    <li class="cursor-pointer">
                        <svg class="h-8 w-8 hover:scale-105" fill="#fcfcfd" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M19.54 0c1.356 0 2.46 1.104 2.46 2.472v21.528l-2.58-2.28-1.452-1.344-1.536-1.428.636 2.22h-13.608c-1.356 0-2.46-1.104-2.46-2.472v-16.224c0-1.368 1.104-2.472 2.46-2.472h16.08zm-4.632 15.672c2.652-.084 3.672-1.824 3.672-1.824 0-3.864-1.728-6.996-1.728-6.996-1.728-1.296-3.372-1.26-3.372-1.26l-.168.192c2.04.624 2.988 1.524 2.988 1.524-1.248-.684-2.472-1.02-3.612-1.152-.864-.096-1.692-.072-2.424.024l-.204.024c-.42.036-1.44.192-2.724.756-.444.204-.708.348-.708.348s.996-.948 3.156-1.572l-.12-.144s-1.644-.036-3.372 1.26c0 0-1.728 3.132-1.728 6.996 0 0 1.008 1.74 3.66 1.824 0 0 .444-.54.804-.996-1.524-.456-2.1-1.416-2.1-1.416l.336.204.048.036.047.027.014.006.047.027c.3.168.6.3.876.408.492.192 1.08.384 1.764.516.9.168 1.956.228 3.108.012.564-.096 1.14-.264 1.74-.516.42-.156.888-.384 1.38-.708 0 0-.6.984-2.172 1.428.36.456.792.972.792.972zm-5.58-5.604c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332.012-.732-.54-1.332-1.224-1.332zm4.38 0c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332 0-.732-.54-1.332-1.224-1.332z"/>
                        </svg>
                    </li>
                  
                    <li class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:scale-105" fill="#fcfcfd" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </li>
                  
                    <li class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:scale-105" fill="#fcfcfd" viewBox="0 0 24 24">
                            <path d="M4.98 3.5C4.98 4.881 3.87 6 2.5 6S.02 4.881.02 3.5 1.13 1 2.5 1s2.48 1.12 2.48 2.5zm.02 4.5H1V24h5V7.5zm7.982 0H9.034V24h4.969V15.601c0-4.67 6.029-5.052 6.029 0V24h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714V7.5z"/></svg>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-background absolute top-0 right-0 w-full h-full opacity-70"></div>
    </section>

    <footer class="bg-background ">
        <div class="mx-auto w-full max-w-screen-xl pt-8">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-text uppercase">Навигација</h2>
                <ul class="text-text font-medium">
                    <li class="mb-4">
                        <a href="razvoj/razvoj.php" class=" hover:underline">Развој</a>
                    </li>
                    <li class="mb-4">
                        <a href="dizajn/dizajn.php" class="hover:underline">Дизајн</a>
                    </li>
                    <li class="mb-4">
                        <a href="resursi/resursi.php" class="hover:underline">Ресурси</a>
                    </li>
                    <li class="mb-4">
                        <a href="magazin/magazin.php" class="hover:underline">Магазин</a>
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
                        <a href="magazin/blog.php" class="hover:underline">Блог</a>
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
</body>
</html>
