async function kreirajKorisnika(event) {
    event.preventDefault();

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php';
    const formData = new FormData(event.target);

    const ime = formData.get('firstName');
    const prezime = formData.get('lastName');
    const korisnickoIme = formData.get('username');
    const email = formData.get('email');
    const lozinka = formData.get('password');
    const potvrdaLozinke = formData.get('confirm-password');

    if (lozinka !== potvrdaLozinke) {
        alert("Лозинке се не поклапају.");
        return;
    }

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ korisnickoIme, lozinka, ime, prezime, email })
        });

        const data = await response.json();

        if (data.status === 'success') {
            window.location.href = 'login.php';
        } else {
            alert("Регисрација неуспешна. Молим Вас покушајте поново.");
        }

    } catch (error) {
        console.error('Greška:', error);
        alert("Дошло је до грешке.");
    }
}

const formularZaRegistraciju = document.querySelector('form');
formularZaRegistraciju.addEventListener('submit', kreirajKorisnika);
