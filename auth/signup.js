async function kreirajKorisnika(event) {
    event.preventDefault();

    const apiUrl = 'http://мајндивелопмент.срб/DB/create_user.php';
    const formData = new FormData(event.target);
    let ime, prezime;
    const fullName = formData.get('fullName');
    const nameParts = fullName.split(' ');
    
    if (nameParts.length >= 2) {
        ime = nameParts[0]; 
        prezime = nameParts.slice(1).join(' ');
    } else {
        alert("Морате унести Ваше пуно име и презиме.");
        return;
    }
    
    const korisnicko_ime = formData.get('username');
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
            body: JSON.stringify({ korisnicko_ime, lozinka, ime, prezime, email })
        });

        const data = await response.json();

        if (data.status === 'success') {
            window.location.href = 'login.php';
        } else {
            if (data.message === "Username already exists") {
                alert("Корисничко име већ постоји. Молим Вас изаберите друго.");
            } else if (data.message === "Email already exists") {
                alert("Е-маил већ постоји у систему. Молим Вас користите други е-маил.");
            } else {
                alert("Регистрација неуспешна. Молим Вас покушајте поново.");
            }
        }

    } catch (error) {
        console.error('Greška:', error);
        alert("Дошло је до грешке приликом комуникације са сервером.");
    }
}

const formularZaRegistraciju = document.querySelector('form');
formularZaRegistraciju.addEventListener('submit', kreirajKorisnika);
