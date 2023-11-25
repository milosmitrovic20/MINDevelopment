async function createUser(event) {
    event.preventDefault(); // Prevent the default form submission

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php'; // Replace with your actual API URL
    const formData = new FormData(event.target);

    const email = formData.get('email');
    const password = formData.get('password');
    const confirmPassword = formData.get('confirm-password');

    if (password !== confirmPassword) {
        alert("Passwords don't match.");
        return;
    }

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username: email, password: password, email: email })
        });

        const data = await response.json();

        if (data.status === 'success') {
            // Redirect to a specific page upon successful signup
            window.location.href = 'login.html'; // Replace with the URL you want to redirect to
        } else {
            // Alert the user in case of a failure
            alert(data.message || "Пријављивање неуспешно. Молим Вас покушајте поново.");
        }

    } catch (error) {
        console.error('Error:', error);
        alert("Дошло је до грешке.");
    }
}

const signupForm = document.querySelector('form');
signupForm.addEventListener('submit', createUser);
