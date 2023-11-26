let modal = document.getElementById('defaultModal');
let openModalButton = document.getElementById('defaultModalButton');
let closeModalButton = document.getElementById('closeModal');
let form = document.querySelector('form');
let overlay = document.getElementById('overlay');

function toggleModal() {
    overlay.classList.toggle('hidden');
    modal.classList.toggle('hidden');
    overlay.classList.toggle('absolute');
    modal.classList.toggle('flex');
}

if (openModalButton != null) {
    openModalButton.addEventListener('click', function() {
        toggleModal();
        document.body.style.overflow = 'hidden';
    });
    
    closeModalButton.addEventListener('click', function() {
        toggleModal();
        document.body.style.overflow = 'visible';
    });
}

const toggleDropdown = () => {
    const dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");
};

document.getElementById("dropdown-button").addEventListener('click', toggleDropdown);

async function getAllBlogPosts() {
    const apiUrl = 'http://мајндивелопмент.срб/DB/get_blogs.php'; 

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.status === 'success') {
            const blogContainer = document.querySelector('.grid'); 

            data.data.forEach(blog => {
                const blogElement = createBlogPostHTML(blog);
                blogContainer.innerHTML += blogElement;
            });
        } else {
            alert(data.message);
        }
    } catch (error) {
        alert("Дошло је до непознате грешке");
    }
}

function createBlogPostHTML(blog) {
    return `
        <article class="p-6 bg-secondary rounded-lg border shadow-md border-secondary">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    ${blog.kategorija} <!-- Displaying category -->
                </span>
                <span class="text-sm">${new Date(blog.datum_objave).toLocaleDateString()}</span> <!-- Displaying current date -->
            </div>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-white">
                <a href="#">${blog.naslov}</a> <!-- Displaying title -->
            </h2>
            <p class="line-clamp-3 mb-5 font-light text-gray-400">${blog.sadrzaj}</p> <!-- Displaying content -->
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                ${blog.autor_slika ? `<img class="w-7 h-7 rounded-full" src="../images/ikone/${blog.autor_slika}.png" alt="Author avatar" />` : ''}
                <span class="font-medium text-white"> ${blog.autor_korisnicko_ime} </span>
                </div>
                <a href="blog.html?blogId=${blog.blog_id}" class="inline-flex items-center font-medium text-primary hover:underline">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </article>
    `;
}

getAllBlogPosts();


document.getElementById('blogForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    let naslov = document.getElementById('name').value;
    let kategorija = document.getElementById('category').value;
    let sadrzaj = document.getElementById('description').value;

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_blog.php';
    const blogContainer = document.querySelector('.grid');

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
            toggleModal(); 

            const noviBlog = {
                naslov: naslov, 
                sadrzaj: sadrzaj, 
                kategorija: kategorija,
                autor_korisnicko_ime: "Ви",
                datum_objave: new Date().toISOString()
            };
            const noviBlogHTML = createBlogPostHTML(noviBlog);
            blogContainer.innerHTML = noviBlogHTML + blogContainer.innerHTML;
        } else if (data.status === 'error' && data.message === 'Корисник није улогован!') {
            alert("Морате се улоговати да бисте направили блог!");
        } else {
            console.log(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
});