<?php
session_start(); // Start the session

// Check if user is already logged in
if (isset($_SESSION['userID'])) {
    // Redirect to a different page if the user is already logged in
    header('Location: http://мајндивелопмент.срб/magazin/magazin.html'); // Replace 'your_dashboard.php' with your dashboard page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пријава</title>
    <link rel="icon" href="../images/logo.svg" type="image/icon">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body background="../images/svetlotamno.svg">
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-4 text-2xl font-semibold text-text">
                <img class="w-8 h-8 mr-2" src="../images/logo.svg" alt="Ћирилко лого">
                Ћирилко    
            </a>
            <div class="w-full bg-background rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-6 md:space-y-8 lg:space-y-10 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-text md:text-2xl">
                        Пријави се
                    </h1>
                    <form action="#">
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-text">Корисничко име или мејл</label>
                            <input required type="email" name="email" id="email" class="text-text sm:text-sm rounded-lg block w-full p-2.5 bg-secondary placeholder-gray-400" placeholder="Петар Петровић" required="">
                        </div>
                        <div class="lg: mb-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Лозинка</label>
                            <input required type="password" name="password" id="password" placeholder="••••••••" class="text-text sm:text-sm rounded-lg block w-full p-2.5 bg-secondary placeholder-gray-400" required="">
                        </div>
                        <div class="flex items-end justify-end mb-8">
                            <a href="#" class="text-sm font-medium text-primary hover:underline">Заборављена лозинка?</a>
                        </div>
                        <button type="submit" class="w-full text-background bg-primary hover:bg-primary-hover font-medium rounded-lg text-base px-5 py-4 text-center lg:mb-4">Пријавa</button>
                        <p class="text-sm font-light text-text">
                            Немате налог? <a href="./signup.html" class="font-medium text-primary hover:underline">Региструј се</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="login.js"></script>
</body>
</html>