let modal = document.getElementById('defaultModal');
let openModalButton = document.getElementById('defaultModalButton');
let closeModalButton = document.getElementById('closeModal');

function toggleModal() {
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}

openModalButton.addEventListener('click', function() {
    toggleModal();
});

closeModalButton.addEventListener('click', function() {
    toggleModal();
});

async function createBlogPost(korisnikId, naslov, sadrzaj) {
    const apiUrl = 'http://мајндивелопмент.срб/DB/create_blog.php'; 

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ korisnikId, naslov, sadrzaj })
        });

        const data = await response.json();
        if (data.status === 'success') {
            console.log(data.message);
            // Handle successful blog creation (e.g., redirect or update UI)
        } else {
            console.log(data.message);
            // Handle failure (e.g., show an error message)
        }

    } catch (error) {
        console.error('Error:', error);
    }
}

createBlogPost(1, 'Sample Blog Title', 'This is the content of the blog.');