const mediaQuery = window.matchMedia('(min-width: 768px)');

function handleMediaChange(event) {
    if (event.matches) {
        const carouselInner = document.querySelector('.several-elements .carousel-inner');
        if (!carouselInner) {
            return;
        }
        const cardWidth = carouselInner.querySelector('.carousel-item').offsetWidth;
        let scrollPosition = 0;

        document.querySelector('.carousel-control-next').addEventListener('click', () => {
            const carouselWidth = carouselInner.scrollWidth;

            if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            }
        });

        document.querySelector('.carousel-control-prev').addEventListener('click', () => {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
}

mediaQuery.addEventListener('change', handleMediaChange);
handleMediaChange(mediaQuery);
