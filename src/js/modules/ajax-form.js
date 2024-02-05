export default () => {
    const form = document.getElementById('acf-form');

    if (!form) {
        return;
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const errorMessages = form.querySelectorAll('.acf-error-message');

        errorMessages.forEach(errorMessage => {
            errorMessage.remove();
        });

        const formData = new FormData(form);

        const xhr = new XMLHttpRequest();
        const action = '/wp-json/api/save_realty';
        xhr.open('POST', action, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                console.log('Form submitted successfully');
                const responseData = JSON.parse(xhr.responseText);
                const carouselInner = document.querySelector('#carouselRealty .carousel-inner');

                if (carouselInner && responseData.message === 'success') {
                    carouselInner.insertAdjacentHTML('afterbegin', responseData.post);
                    form.reset();
                    form.querySelector('.acf-gallery-attachments').innerHTML = '';
                    jQuery('#successModal').modal('show');
                }
            } else {
                console.error('Form submit error');
                console.error(xhr.statusText);
            }
        };

        xhr.onerror = function () {
            console.error('Form submit error');
        };

        xhr.send(formData);
    });

    const successModal = document.getElementById('successModal');
    successModal.addEventListener('hidden.bs.modal', function () {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
}
