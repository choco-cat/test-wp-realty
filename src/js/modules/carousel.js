export default () => {
    function handleMediaChange(countSlides) {
        return function (event) {
            if (event.matches) {
                const carouselInner = document.querySelector('.several-elements .carousel-inner');
                if (!carouselInner) {
                    return;
                }
                const cardWidth = carouselInner.querySelector('.carousel-item').offsetWidth;
                let scrollPosition = 0;

                document.querySelector('.carousel-control-next').addEventListener('click', () => {
                    const carouselWidth = carouselInner.scrollWidth;

                    if (scrollPosition < carouselWidth - cardWidth * countSlides) {
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
        };
    }

    const mediaQuery1400 = window.matchMedia('(min-width: 1400px)');
    const mediaQuery992 = window.matchMedia('(min-width: 992px)');
    const mediaQuery768 = window.matchMedia('(min-width: 768px)');

    mediaQuery1400.addEventListener('change', handleMediaChange(4));
    mediaQuery992.addEventListener('change', handleMediaChange(3));
    mediaQuery768.addEventListener('change', handleMediaChange(2));

    handleMediaChange(4)(mediaQuery1400);
    handleMediaChange(3)(mediaQuery992);
    handleMediaChange(2)(mediaQuery768);
};
