document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('passwd').value.trim();
    let errorMessage = '';

    if (!email) {
        errorMessage += 'Email is required.<br>';
    }

    if (!password) {
        errorMessage += 'Password is required.<br>';
    }

    if (errorMessage) {
        event.preventDefault();
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';
        alertDiv.innerHTML = errorMessage;

        const form = document.getElementById('loginForm');
        const existingAlert = form.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        form.insertBefore(alertDiv, form.firstChild);
    }
});