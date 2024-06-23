document.getElementById('registerForm').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value.trim();
    const surname = document.getElementById('surname').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('passwd').value.trim();
    const passwordR = document.getElementById('passwdR').value.trim();
    let errorMessage = '';

    if (!name) {
        errorMessage += 'Name is required.<br>';
    }

    if (!surname) {
        errorMessage += 'Surname is required.<br>';
    }

    if (!email) {
        errorMessage += 'Email is required.<br>';
    }

    if (!phone) {
        errorMessage += 'Phone is required.<br>';
    }

    if (!password) {
        errorMessage += 'Password is required.<br>';
    } else if (password.length < 8) {
        errorMessage += 'Password must be at least 8 characters long.<br>';
    }

    if (!passwordR) {
        errorMessage += 'Confirm password is required.<br>';
    } else if (password !== passwordR) {
        errorMessage += 'Passwords do not match.<br>';
    }

    if (errorMessage) {
        event.preventDefault();
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';
        alertDiv.innerHTML = errorMessage;

        const form = document.getElementById('registerForm');
        const existingAlert = form.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        form.insertBefore(alertDiv, form.firstChild);
    }
});