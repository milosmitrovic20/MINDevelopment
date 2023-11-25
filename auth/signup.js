async function createUser(username, password, ime, prezime, email) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php'; 

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
        console.log(data);

    } catch (error) {
        console.error('Error:', error);
    }
}

createUser('newusername', 'password123', 'John', 'Doe', 'john@example.com');