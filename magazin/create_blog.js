async function createBlogPost(korisnikId, naslov, sadrzaj) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/create_blog.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ korisnikId, naslov, sadrzaj })
        });

        const data = await response.json();
        if (data.status === 'success') {
            console.log(data.message);
            // Handle successful blog creation (e.g., redirect or update UI)
        } else {
            console.log(data.message);
            // Handle failure (e.g., show an error message)
        }

    } catch (error) {
        console.error('Error:', error); // Handle the error
    }
}

// Example usage
createBlogPost(1, 'Sample Blog Title', 'This is the content of the blog.');
