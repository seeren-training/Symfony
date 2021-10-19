if (document.querySelector('body.card_index')) {

    const registerDeckListEvents = () => {
        M.FormSelect.init(document.querySelectorAll('select'));
        const optionList = document.querySelectorAll('option[data-active]');
        const [, ...materializeOptionList] = document.querySelectorAll('.dropdown-content li');
        materializeOptionList.forEach((materializeOption, index) =>
            materializeOption.addEventListener(
                'click',
                () => window.location.href = optionList[index].getAttribute('data-active')
            )
        );
    };

    const lazyLoadImages = () => {
        document.querySelectorAll('img[data-src]').forEach(mtgImage => {
            const image = new Image();
            image.onload = image.onError = () => {
                mtgImage.parentNode.removeChild(mtgImage.parentNode.querySelector('.progress'));
                mtgImage.src = image.src;
                mtgImage.removeAttribute('data-src');
            }
            image.src = mtgImage.getAttribute('data-src');
        })
    }

    registerDeckListEvents();
    lazyLoadImages();
}
