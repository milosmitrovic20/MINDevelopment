async function loginUser(username, password) {
    const apiUrl = 'https://мајндивелопмент.срб/DB//login.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username, password })
        });

        const data = await response.json();
        if (data.status === 'success') {
            console.log(data.message);
            // Handle successful login (e.g., redirect to a dashboard)
        } else {
            console.log(data.message);
            // Handle login failure (e.g., show an error message)
        }

    } catch (error) {
        console.error('Error:', error); // Handle the error
    }
}

// Example usage
loginUser('username', 'password123');
