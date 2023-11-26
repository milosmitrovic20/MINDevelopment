const urlParams = new URLSearchParams(window.location.search);
const blogId = urlParams.get('id');

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
            displayBlogDetails(data.data.blogDetails);
            displayComments(data.data.comments);
        } else {
            console.error(data.message);
            // Additional code to handle errors (e.g., display error message to user)
        }
    } catch (error) {
        console.error('Error:', error);
        // Additional error handling (e.g., display error message)
    }
}

function displayBlogDetails(blogDetails) {
    // Implement this function to update the HTML with blog details
    // Example: document.querySelector('#blogTitle').textContent = blogDetails.naslov;
}

fetchBlogDetailsAndComments();


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
  