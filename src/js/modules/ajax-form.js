export default () => {
    const form = document.getElementById('acf-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        const action = '/wp-json/api/save_realty';
        xhr.open('POST', action, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                console.log('Form submitted successfully');
                console.log(xhr.responseText);
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
}
