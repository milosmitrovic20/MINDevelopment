async function postComment(blogId, commentText) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/create_comment.php';

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ blogId, tekst: commentText })
        });

        const data = await response.json();

        if (data.status === 'success') {
            console.log(data.message);
            // Additional code to handle success (e.g., clear comment form, update comments on the page)
        } else {
            console.error(data.message);
            // Additional code to handle errors (e.g., display error message to user)
        }
    } catch (error) {
        console.error('Error:', error);
        // Additional error handling (e.g., display error message)
    }
}

async function fetchComments(blogId) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/get_comments.php';

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ blogId })
        });

        const data = await response.json();

        if (data.status === 'success') {
            console.log('Comments:', data.comments);
            // Additional code to handle success (e.g., display comments on the page)
            return data.comments;
        } else {
            console.error(data.message);
            // Additional code to handle errors (e.g., display error message to user)
            return null;
        }
    } catch (error) {
        console.error('Error:', error);
        // Additional error handling (e.g., display error message)
        return null;
    }
}

