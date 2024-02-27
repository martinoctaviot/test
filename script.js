document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario automáticamente

        // Validar los campos
        const nombre = document.getElementById('nombre').value.trim();
        const apellido = document.getElementById('apellido').value.trim();
        const email = document.getElementById('email').value.trim();
        const telefono = document.getElementById('telefono').value.trim();
        const direccion = document.getElementById('direccion').value.trim();
        const sexo = document.getElementById('sexo').value;
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        let isValid = true; // Bandera para indicar si el formulario es válido

        // Verificar si los campos están vacíos y mostrar mensajes de error
        if (nombre === '') {
            showError('nombre', 'Por favor, completa este campo con tu nombre');
            isValid = false;
        } else {
            hideError('nombre');
        }

        if (apellido === '') {
            showError('apellido', 'Por favor, completa este campo con tu apellido');
            isValid = false;
        } else {
            hideError('apellido');
        }

        if (direccion === '') {
            showError('direccion', 'Por favor, completa este campo con tu dirección');
            isValid = false;
        } else {
            hideError('direccion');
        }

        if (sexo === '') {
            showError('sexo', 'Por favor, selecciona tu sexo');
            isValid = false;
        } else {
            hideError('sexo');
        }

        if (username === '') {
            showError('username', 'Por favor, introduce tu nombre de usuario');
            isValid = false;
        } else {
            hideError('username');
        }

        if (password === '') {
            showError('password', 'Por favor, introduce tu contraseña');
            isValid = false;
        } else {
            hideError('password');
        }

        // Verificar si el email está en un formato válido
        if (!validateEmail(email)) {
            showError('email', 'Por favor, introduce un correo electrónico válido');
            isValid = false;
        } else {
            hideError('email');
        }

        // Verificar si el teléfono está en un formato válido
        if (!validatePhone(telefono)) {
            showError('telefono', 'Por favor, introduce un número de teléfono válido (Formato: 123-456-7890)');
            isValid = false;
        } else {
            hideError('telefono');
        }

        if (isValid) {
            // Aquí puedes hacer lo que necesites con los datos del formulario, como enviarlos a un servidor
            alert('Formulario enviado correctamente');
            form.reset(); // Reiniciar el formulario después del envío exitoso
        }
    });
});

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    field.classList.add('error'); // Agregar clase de estilo para resaltar el campo con error
    const errorMessage = field.parentElement.querySelector('.error-message');
    if (errorMessage) {
        errorMessage.textContent = message; // Cambiar el texto del mensaje de error si ya existe
    } else {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        field.parentElement.appendChild(errorDiv); // Insertar mensaje de error después del campo
    }
}

function hideError(fieldId) {
    const field = document.getElementById(fieldId);
    field.classList.remove('error'); // Remover clase de estilo de campo con error
    const errorMessage = field.parentElement.querySelector('.error-message');
    if (errorMessage) {
        errorMessage.remove(); // Remover mensaje de error si existe
    }
}

function validateEmail(email) {
    // Expresión regular para validar email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    // Expresión regular para validar teléfono
    const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;
    return phoneRegex.test(phone);
}
