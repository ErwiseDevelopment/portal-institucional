//banner
const swiperBanner = new Swiper( '.js-swiper-banner', {
    loop: true,

    autoplay: {
        delay: 6000,
        disableOnInteraction: false
    }
});

//about
const swiperAbout = new Swiper( '.js-swiper-about', {
    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        992: {
            slidesPerView: 3,
            spaceBetween: 30,
        }
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-about',
        nextEl: '.js-swiper-button-next-about',
    }
})

//calendar
const swiperMonth = new Swiper( '.js-swiper-month', {
    allowTouchMove: false,

    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//calendar day
const swiperDay = new Swiper( '.js-swiper-day', {
    allowTouchMove: false,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//videos
const swiperVideos = new Swiper( '.js-swiper-videos', {
    navigation: {
        prevEl: '.js-swiper-button-prev-videos',
        nextEl: '.js-swiper-button-next-videos'
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 3,
            spaceBetween: 6,
        }
    }
}) 

//partners 
const swiperPartners = new Swiper( '.js-swiper-partners', {
    spaceBetween: 30,
    loop: true,

    breakpoints: {
        320: {
            slidesPerView: 2,
        },

        768: {
            slidesPerView: 4,
        },

        992: {
            slidesPerView: 5,
        },
    },

    autoplay: {
        delay: 6000,
        disableOnInteraction: false,
    },

    navigation: {
        prevEl: '.js-swiper-button-prev-partners',
        nextEl: '.js-swiper-button-next-partners'
    }
})

const swiperProvince = new Swiper( '.js-swiper-province', {
    slidesPerView: 4,
    spaceBetween: 30,

    autoplay: {
        delay: 6000,
        disableOnInteraction: false
    }
})