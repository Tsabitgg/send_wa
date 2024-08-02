//toogle
document.getElementById('hamburger').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('hidden');
});

//proses loading login
function handleSubmit(event) {
    event.preventDefault();
    const button = document.getElementById('loginButton');
    button.innerHTML = `
        <svg class="animate-spin w-7 h-7 mr-2" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
            <circle cx="400" cy="400" fill="none" r="250" stroke-width="110" stroke="#919abf" stroke-dasharray="1276 1400" />
        </svg>
        Processing...
    `;
    button.disabled = true;
    
    const form = event.target;
    fetch('../Config/auth.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        if (data.success) {
            window.location.href = 'homepage.php'; // Redirect to dashboard
        } else {
            button.innerHTML = 'Sign in';
            button.disabled = false;
            alert('Login failed: ' + data.message);
        }
    })

}

//scrollicon top
document.addEventListener('scroll', function() {
    const scrollIcon = document.getElementById('scrollIcon');
    const scrollPosition = window.scrollY;

    if (scrollPosition > 100) { // Ganti 100 dengan nilai yang sesuai untuk kebutuhan Anda
        scrollIcon.classList.remove('opacity-0');
        scrollIcon.classList.add('opacity-100');
    } else {
        scrollIcon.classList.remove('opacity-100');
        scrollIcon.classList.add('opacity-0');
    }
});


