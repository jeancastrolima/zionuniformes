document.addEventListener('DOMContentLoaded', () => {

    console.log('Inputmask disponível:', window.Inputmask);

    // 1. CAMPOS
    const phoneInput = document.getElementById('phone');
    const cnpjInput = document.getElementById('cnpj');
    const employeesInput = document.getElementById('employees');

    // 2. MÁSCARAS (PROTEGIDAS)
    if (window.Inputmask && phoneInput) {
        new window.Inputmask({
            mask: ["(99) 9999-9999", "(99) 99999-9999"],
            keepStatic: true,
            showMaskOnHover: false,
            clearIncomplete: true
        }).mask(phoneInput);
    }

    if (window.Inputmask && cnpjInput) {
        new window.Inputmask({
            mask: "99.999.999/9999-99",
            showMaskOnHover: false,
            clearIncomplete: true
        }).mask(cnpjInput);
    }

    if (window.Inputmask && employeesInput) {
        new window.Inputmask({
            alias: "numeric",
            allowMinus: false,
            digits: 0,
            rightAlign: false
        }).mask(employeesInput);
    }

    // 3. FORMULÁRIO
    const quoteForm = document.getElementById('quoteForm');
    if (!quoteForm) return;

    const submitBtn = quoteForm.querySelector('button[type="submit"]');

    quoteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Enviando...';

        const formData = new FormData(quoteForm);

        fetch('enviar-cotacao.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');

            if (data.status === 'success') {
                modalTitle.innerText = 'Cotação enviada!';
                modalMessage.innerHTML =
                    `<div class="alert alert-success mb-0">${data.message}</div>`;
                quoteForm.reset();
            } else {
                modalTitle.innerText = 'Erro';
                modalMessage.innerHTML =
                    `<div class="alert alert-danger mb-0">${data.message}</div>`;
            }

            new bootstrap.Modal(
                document.getElementById('responseModal')
            ).show();
        })
        .catch(() => {
            alert('Erro ao enviar. Verifique o servidor.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Solicitar Cotação';
        });
    });
});
