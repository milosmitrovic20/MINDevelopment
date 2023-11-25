async function getAllBlogPosts() {
    const apiUrl = 'http://мајндивелопмент.срб/DB/get_blogs.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            const blogContainer = document.querySelector('.grid'); // Assuming this is your grid container

            data.data.forEach(blog => {
                const blogElement = `
                    <article class="p-6 bg-secondary rounded-lg border shadow-md border-secondary">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                ${blog.kategorija} <!-- Displaying category -->
                            </span>
                            <span class="text-sm">${new Date(blog.datum_objave).toLocaleDateString()}</span> <!-- Displaying date -->
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-white">
                            <a href="#">${blog.naslov}</a>
                        </h2>
                        <p class="mb-5 font-light text-text">${blog.sadrzaj}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="author_avatar_url.jpg" alt="Author avatar" />
                                <span class="font-medium text-white">
                                    Author Name <!-- Replace with actual author name if available -->
                                </span>
                            </div>
                            <a href="#" class="inline-flex items-center font-medium text-primary hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article>
                `;
                blogContainer.innerHTML += blogElement;
            });
        } else {
            console.error('Failed to fetch blogs:', data.message);
            // Handle the error case
        }
    } catch (error) {
        console.error('Error:', error); // Handle network or other errors
    }
}

getAllBlogPosts();
