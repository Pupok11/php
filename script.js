document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (!form) return;

    // Если нет поля email — это не страница регистрации, выходим
    if (!document.querySelector('[name="email"]')) return;

    form.addEventListener('submit', function (e) {
        let valid = true;

        document.querySelectorAll('.error-text').forEach(el => el.remove());

        const username = document.querySelector('[name="username"]');
        const email    = document.querySelector('[name="email"]');
        const password = document.querySelector('[name="password"]');

        if (username && username.value.trim().length < 3) {
            showError(username, 'Логин минимум 3 символа');
            valid = false;
        }

        if (email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!re.test(email.value.trim())) {
                showError(email, 'Введите корректный email');
                valid = false;
            }
        }

        if (password && password.value.length < 6) {
            showError(password, 'Пароль минимум 6 символов');
            valid = false;
        }

        if (!valid) e.preventDefault();
    });

    function showError(input, message) {
        const small = document.createElement('small');
        small.className = 'error-text';
        small.textContent = message;
        input.insertAdjacentElement('afterend', small);
    }
});