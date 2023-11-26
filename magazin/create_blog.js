// Add event listener for form submission
form.addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get values from the form fields
    let naslov = document.getElementById('name').value;
    let kategorija = document.getElementById('category').value;
    let sadrzaj = document.getElementById('description').value;

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_blog.php';

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ naslov, sadrzaj, kategorija })
        });

        const data = await response.json();
        if (data.status === 'success') {
            console.log(data.message);
            toggleModal(); // Close the modal on success
        } else if (data.status === 'error' && data.message === 'Корисник није улогован!') {
            console.error('Корисник није улогован!')
            window.location.href = "/blog.html";
            // Redirect to login page or show login modal, etc.
        } else {
            console.log(data.message);
            // Handle failure (e.g., show an error message)
        }
    } catch (error) {
        console.error('Error:', error);
    }
});
