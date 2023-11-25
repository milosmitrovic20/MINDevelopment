async function loginUser(event) {
    event.preventDefault(); // Prevent the default form submission

    const apiUrl = 'http://мајндивелопмент.срб/DB/login.php'; // Replace with your actual API URL
    const formData = new FormData(event.target);
    const username = formData.get('email'); // Assuming 'email' field is used as the username
    const password = formData.get('password');
    console.log("ALOALO");
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
            window.location.href = 'http://мајндивелопмент.срб/magazin/magazin.html'; // Replace 'dashboard.html' with the URL you want to redirect to
        } else {
            alert("Погрешна шифра или корисничко име!");
        }

    } catch (error) {
        console.error('Грешка:', error); // Handle the error
    }
}

const loginForm = document.querySelector('form');
loginForm.addEventListener('submit', loginUser);
