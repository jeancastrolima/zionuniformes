const form = document.getElementById('contactForm');

form.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('../../contato.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');

        if (data.status === 'success') {
            modalTitle.innerText = 'Mensagem enviada';
            modalMessage.innerHTML = `
                <div class="alert alert-success mb-0">
                    ${data.message}
                </div>
            `;
            form.reset();
        } else {
            modalTitle.innerText = 'Erro';
            modalMessage.innerHTML = `
                <div class="alert alert-danger mb-0">
                    ${data.message}
                </div>
            `;
        }

        const modal = new bootstrap.Modal(
            document.getElementById('responseModal')
        );
        modal.show();
    })
    .catch(() => {
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');

        modalTitle.innerText = 'Erro';
        modalMessage.innerHTML = `
            <div class="alert alert-danger mb-0">
                Erro inesperado. Tente novamente mais tarde.
            </div>
        `;

        const modal = new bootstrap.Modal(
            document.getElementById('responseModal')
        );
        modal.show();
    });
});
