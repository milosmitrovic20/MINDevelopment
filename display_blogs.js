async function getAllBlogPosts() {
    const apiUrl = 'http://мајндивелопмент.срб/get_blogs.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            console.log('Blogs:', data.data);
            // Process and display the blog posts (e.g., add them to the DOM)
        } else {
            console.error('Failed to fetch blogs:', data.message);
            // Handle the error case
        }
    } catch (error) {
        console.error('Error:', error); // Handle network or other errors
    }
}

// Example usage
getAllBlogPosts();
