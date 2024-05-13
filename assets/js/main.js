// Function that actually builds the swiper 
const buildSwiperSlider = (sliderElm, slidesPerView, breakpoints) => {
  const sliderId = sliderElm.dataset.id;

  return new Swiper(`#${sliderElm.id}`, {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: slidesPerView,

    navigation: {
      nextEl: `.button-next-${sliderId}`,
      prevEl: `.button-prev-${sliderId}`
    },

    pagination: {
      el: `.swiper-pagination-${sliderId}`,
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      },
    },

    breakpoints: breakpoints,
  });
};

// Get all of the swipers on the page
const allSliders = document.querySelectorAll('.swiper');

// Loop over all of the fetched sliders and apply Swiper on each one.
allSliders.forEach(slider => {
  let slidesPerView = 1;
  let breakpoints = {
    640: {
      slidesPerView: 2,
      spaceBetween: 12,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 12,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 12,
    },
  };

  if (slider.id === 'swiper4') {
    slidesPerView = 1;
    breakpoints = {
      640: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      1024: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
    };
  }

  if (slider.id === 'swiper5') {
    slidesPerView = 1;
    breakpoints = {
      640: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      1024: {
        slidesPerView: 4.5,
        spaceBetween: 12,
      },
    };
  }

  if (slider.id === 'swiper-topics') {
    slidesPerView = 1;
    breakpoints = {
      640: {
        slidesPerView: 1.5,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 2.5,
        spaceBetween: 12,
      },
      1024: {
        slidesPerView: 3.5,
        spaceBetween: 12,
      },
    };
  }

  buildSwiperSlider(slider, slidesPerView, breakpoints);
});