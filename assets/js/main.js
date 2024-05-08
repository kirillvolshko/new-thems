// Function that actually builds the swiper 
const buildSwiperSlider = sliderElm => {
  const sliderIdentifier = sliderElm.dataset.id;

  return new Swiper(`#${sliderElm.id}`, {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,

    navigation: {
      nextEl: `.button-next-${sliderIdentifier}`,
      prevEl: `.button-prev-${sliderIdentifier}`
    },

    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 150,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 150,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 150,
      },
    },
  });
}

// Get all of the swipers on the page
const allSliders = document.querySelectorAll('.swiper');

// Loop over all of the fetched sliders and apply Swiper on each one.
allSliders.forEach(slider => buildSwiperSlider(slider));
