async function loginUser(event) {
    event.preventDefault();

    const apiUrl = 'http://мајндивелопмент.срб/DB/login.php';
    const formData = new FormData(event.target);
    const username = formData.get('email');
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
            window.location.href = 'http://мајндивелопмент.срб/magazin/magazin.php';
        } else {
            alert("Погрешна шифра или корисничко име!");
        }

    } catch (error) {
        console.error('Грешка:', error);
    }
}

const loginForm = document.querySelector('form');
loginForm.addEventListener('submit', loginUser);
