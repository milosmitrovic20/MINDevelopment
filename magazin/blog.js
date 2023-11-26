const urlParams = new URLSearchParams(window.location.search);
const blogId = urlParams.get('blogId');

async function fetchBlogDetailsAndComments() {
    //Vraca
    const apiUrl = `http://мајндивелопмент.срб/DB/get_blog_by_id.php?blogId=${blogId}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            console.log('Blog Details:', data.data.blogDetails);
            console.log('Comments:', data.data.comments);

            // Additional code to handle success:
            // Display blog details and comments on the page
            displayBlogDetails(data.data.blogDetails, data.data.comments);
        } else {
            console.error(data.message);
            // Additional code to handle errors (e.g., display error message to user)
        }
    } catch (error) {
        console.error('Error:', error);
        // Additional error handling (e.g., display error message)
    }
}

fetchBlogDetailsAndComments();

function displayBlogDetails(blogDetails, comments) {
    const blogContainer = document.querySelector('#blogContainer');

    // Start with the main HTML structure
    let htmlContent = `
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">${blogDetails.naslov}</h1>
                </header>
                <p>${blogDetails.sadrzaj}</p>
                <section class="not-format">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
                    </div>
                    <form class="mb-6">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a comment..." required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Post comment
                        </button>
                    </form>`;

    // Iterate over the comments and add each comment to the HTML content
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
                <!-- Dropdown menu -->
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

    // Close the main HTML structure
    htmlContent += `
                </section>
            </article>
        </div>
    </main>`;

    // Update the inner HTML of the blog container
    blogContainer.innerHTML = htmlContent;
}

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
  