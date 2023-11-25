async function getAllBlogPosts() {
    const apiUrl = 'http://мајндивелопмент.срб/get_blogs.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            const blogContainer = document.querySelector('.grid'); // Assuming this is your grid container

            data.data.forEach(blog => {
                const blogElement = `
                    <article class="p-6 bg-secondary rounded-lg border shadow-md border-secondary">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <!-- Add other elements like date, category here -->
                            <span class="text-sm">${new Date(blog.datum_objave).toLocaleDateString()}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-white">
                            <a href="#">${blog.naslov}</a>
                        </h2>
                        <p class="mb-5 font-light text-text">${blog.sadrzaj}</p>
                        <!-- Add more elements like author, read more link here -->
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

// Example usage
document.addEventListener('DOMContentLoaded', getAllBlogPosts);
