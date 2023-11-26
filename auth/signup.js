async function createUser(event) {
    event.preventDefault();

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php';
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
            window.location.href = 'login.html';
        } else {
            alert(data.message || "Пријављивање неуспешно. Молим Вас покушајте поново.");
        }

    } catch (error) {
        console.error('Error:', error);
        alert("Дошло је до грешке.");
    }
}

const signupForm = document.querySelector('form');
signupForm.addEventListener('submit', createUser);
