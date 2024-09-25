document.getElementById('presentationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Validación del nombre de usuario
    const username = document.getElementById('username').value;
    const usernameError = document.getElementById('usernameError');
    if (username.length < 5 || username.length > 10) {
        usernameError.textContent = 'El nombre de usuario debe tener entre 5 y 10 caracteres.';
        return;
    } else {
        usernameError.textContent = '';
    }

    // Validación de la contraseña
    const password = document.getElementById('password').value;
    const passwordError = document.getElementById('passwordError');
    if (!/^\d{8,}$/.test(password)) {
        passwordError.textContent = 'La contraseña debe ser numérica y tener al menos 8 dígitos.';
        return;
    } else {
        passwordError.textContent = '';
    }

    const formData = {
        nombre: document.getElementById('nombre').value,
        apellido: document.getElementById('apellido').value,
        profesion: document.getElementById('profesion').value,
        lugarTrabajo: document.getElementById('lugarTrabajo').value,
        aniosExperiencia: document.getElementById('aniosExperiencia').value,
        sueldo: document.getElementById('sueldo').value,
        instagram: document.getElementById('instagram').value,
        linkedin: document.getElementById('linkedin').value,
        email: document.getElementById('email').value,
        resumen: document.getElementById('resumen').value,
        username: username,
        password: password
    };

    console.log('Datos de la carta de presentación:', formData);
    alert('Formulario enviado con éxito!');
});