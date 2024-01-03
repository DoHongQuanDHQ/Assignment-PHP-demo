const btnCreateBanner = document.querySelector('.btn-create-banner');
const inputBanner = document.querySelector('[name="banner"]');
const name_file = document.querySelector('.name-file');
btnCreateBanner.addEventListener('click', () => {
    inputBanner.click();
    inputBanner.addEventListener('change', () => {
        name_file.innerText = inputBanner.files[0].name;
    });
});
