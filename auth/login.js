async function loginUser(username, password) {
    const apiUrl = 'http://мајндивелопмент.срб/DB//login.php';

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
        } else {
            console.log(data.message);
        }

    } catch (error) {
        console.error('Error:', error); 
    }
}

loginUser('username', 'password123');