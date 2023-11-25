

async function createUser(username, password, ime, prezime, email) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php'; // Replace with your actual API URL

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username,
                password: password,
                ime: ime,
                prezime: prezime,
                email: email
            })
        });

        const data = await response.json();
        console.log(data); // Handle the response data

    } catch (error) {
        console.error('Error:', error); // Handle the error
    }
}

// Example usage
createUser('newusername', 'password123', 'John', 'Doe', 'john@example.com');
