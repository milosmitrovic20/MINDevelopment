const urlParams = new URLSearchParams(window.location.search);
const blogId = urlParams.get('blogId');

async function fetchBlogDetailsAndComments() {
    const apiUrl = `http://мајндивелопмент.срб/DB/get_blog_by_id.php?blogId=${blogId}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            console.log('Blog Details:', data.data.blogDetails);
            console.log('Comments:', data.data.comments);
            console.log('Author: ', data.data.author);

            displayBlogDetails(data.data.blogDetails, data.data.comments, data.data.author);

            document.getElementById('komentarForma').addEventListener('submit', async (event) => {
                event.preventDefault();

                const commentText = document.getElementById('comment').value;
                const apiUrl = 'http://мајндивелопмент.срб/DB/create_comment.php';

                try {
                    const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ blogId, tekst: commentText }),
                    });

                    const data = await response.json();

                    if (data.status === 'success') {
                        console.log(data.message);
                    } else {
                        alert("Дошло је до грешке! " + data.message);
                    }
                } catch (error) {
                    alert("Дошло је до грешке! " + error);
                }
            });
        } else {
            console.error(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

fetchBlogDetailsAndComments();

function displayBlogDetails(blogDetails, comments, author) {
    const blogContainer = document.querySelector('#blogContainer');

    let htmlContent = `
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="../images/ikone/${author.slika}.png" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">${author.korisnicko_ime}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">${author.ime} ${author.prezime}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="${blogDetails.datum_objave}">${blogDetails.datum_objave}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">${blogDetails.naslov}</h1>
                </header>
                <p>${blogDetails.sadrzaj}</p>
                <section class="not-format">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Дискусија</h2>
                    </div>
                    <form class="mb-6" id="komentarForma">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Твој коментар</label>
                            <textarea id="comment" rows="6"
                                class="px-0 w-full text-sm text-text resize-none border border-accent  bg-secondary"
                                placeholder="Напиши коментар..." required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-secondary bg-primary hover:bg-primary-hover rounded-lg ">
                            Објави коментар
                        </button>
                    </form>`;

    for (let i = 0; i < comments.length; i++) {
        htmlContent += `
        <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">${comments[i].korisnicko_ime}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">${comments[i].datum_komentara}</p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <div id="dropdownComment1"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p>${comments[i].tekst}</p>
        </article>`;
    }

    htmlContent += `
                </section>
            </article>
        </div>
    </main>`;

    blogContainer.innerHTML = htmlContent;
}

document.getElementById("subscribeButton").addEventListener("click", async (event) => {
    console.log("NAJJAACI");
    const emailInput = document.getElementById("email");
    const email = emailInput.value;
    if (!email) { return; }

    const apiUrl = 'http://мајндивелопмент.срб/DB/upload_email.php';

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email }),
        });

        const data = await response.json();

        if (data.status === 'success') {
            console.log(data.message);
        } else {
            console.error(data.message);
        }
        emailInput.value = '';
    } catch (error) {
        console.error('Error:', error);
    }
});

