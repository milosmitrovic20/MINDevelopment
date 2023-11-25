async function loginUser(event) {
    event.preventDefault(); // Prevent the default form submission

    const apiUrl = 'http://мајндивелопмент.срб/DB/login.php'; // Replace with your actual API URL
    const formData = new FormData(event.target);
    const username = formData.get('email'); // Assuming 'email' field is used as the username
    const password = formData.get('password');

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
            console.error(data.message);
            // Handle login failure (e.g., show an error message)
        }

    } catch (error) {
        console.error('Error:', error); // Handle the error
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.querySelector('form');
    loginForm.addEventListener('submit', loginUser);
});
