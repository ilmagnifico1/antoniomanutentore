document.addEventListener('DOMContentLoaded', () => {
  const carouselAll = Array.from(document.querySelectorAll('.carousel img'));
  const realImages = Array.from(document.querySelectorAll('.carousel img[data-real="1"]'));
  const carouselWrapper = document.querySelector('.carousel-wrapper');
  const galleryPrevBtn = document.querySelector('.gallery-control.prev');
  const galleryNextBtn = document.querySelector('.gallery-control.next');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const closeBtn = lightbox ? lightbox.querySelector('.close') : null;
  const prevBtn = lightbox ? lightbox.querySelector('.nav.prev') : null;
  const nextBtn = lightbox ? lightbox.querySelector('.nav.next') : null;
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const coarsePointer = window.matchMedia('(hover: none), (pointer: coarse)');

  if (!realImages.length || !lightbox || !lightboxImg || !closeBtn || !prevBtn || !nextBtn) {
    return;
  }

  let currentIndex = 0;
  let activeTimer = null;

  function isTouchLayout() {
    return coarsePointer.matches || window.innerWidth <= 720;
  }

  function clearActiveImages() {
    carouselAll.forEach((img) => img.classList.remove('active'));
  }

  function updateActiveImage() {
    if (isTouchLayout() || prefersReducedMotion.matches) {
      clearActiveImages();
      return;
    }

    const center = window.innerWidth / 2;

    carouselAll.forEach((img) => {
      const rect = img.getBoundingClientRect();
      const imgCenter = rect.left + rect.width / 2;

      if (Math.abs(center - imgCenter) < rect.width / 2) {
        img.classList.add('active');
      } else {
        img.classList.remove('active');
      }
    });
  }

  function updateCarouselMode() {
    if (activeTimer) {
      window.clearInterval(activeTimer);
      activeTimer = null;
    }

    updateActiveImage();

    if (!isTouchLayout() && !prefersReducedMotion.matches) {
      activeTimer = window.setInterval(updateActiveImage, 120);
    }
  }

  function openLightbox(index) {
    currentIndex = index;
    lightbox.style.display = 'flex';
    lightboxImg.src = realImages[currentIndex].src;
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.style.display = 'none';
    document.body.style.overflow = '';
  }

  function showImage(index) {
    currentIndex = (index + realImages.length) % realImages.length;
    lightboxImg.src = realImages[currentIndex].src;
  }

  function getScrollAmount() {
    const firstRealImage = realImages[0];

    if (!firstRealImage) {
      return 260;
    }

    return firstRealImage.getBoundingClientRect().width + 24;
  }

  function scrollGallery(direction) {
    if (!carouselWrapper) {
      return;
    }

    carouselWrapper.scrollBy({
      left: getScrollAmount() * direction,
      behavior: 'smooth',
    });
  }

  carouselAll.forEach((img) => {
    img.addEventListener('click', () => {
      const clickedSrc = img.src;
      const idx = realImages.findIndex((realImage) => realImage.src === clickedSrc);
      openLightbox(idx >= 0 ? idx : 0);
    });

    img.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const clickedSrc = img.src;
        const idx = realImages.findIndex((realImage) => realImage.src === clickedSrc);
        openLightbox(idx >= 0 ? idx : 0);
      }
    });
  });

  if (galleryPrevBtn) {
    galleryPrevBtn.addEventListener('click', () => {
      scrollGallery(-1);
    });
  }

  if (galleryNextBtn) {
    galleryNextBtn.addEventListener('click', () => {
      scrollGallery(1);
    });
  }

  if (carouselWrapper) {
    carouselWrapper.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        scrollGallery(-1);
      }

      if (e.key === 'ArrowRight') {
        e.preventDefault();
        scrollGallery(1);
      }
    });
  }

  closeBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    closeLightbox();
  });

  prevBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    showImage(currentIndex - 1);
  });

  nextBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    showImage(currentIndex + 1);
  });

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (lightbox.style.display !== 'flex') {
      return;
    }

    if (e.key === 'Escape') {
      closeLightbox();
    }

    if (e.key === 'ArrowLeft') {
      showImage(currentIndex - 1);
    }

    if (e.key === 'ArrowRight') {
      showImage(currentIndex + 1);
    }
  });

  let startX = 0;
  let startY = 0;
  const swipeMin = 50;
  const verticalMax = 80;

  lightboxImg.addEventListener('touchstart', (e) => {
    if (lightbox.style.display !== 'flex') {
      return;
    }

    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
  }, { passive: true });

  lightboxImg.addEventListener('touchend', (e) => {
    if (lightbox.style.display !== 'flex') {
      return;
    }

    const endX = e.changedTouches[0].clientX;
    const endY = e.changedTouches[0].clientY;
    const diffX = endX - startX;
    const diffY = endY - startY;

    if (Math.abs(diffY) > verticalMax) {
      return;
    }

    if (Math.abs(diffX) >= swipeMin) {
      if (diffX < 0) {
        showImage(currentIndex + 1);
      } else {
        showImage(currentIndex - 1);
      }
    }
  }, { passive: true });

  updateCarouselMode();
  window.addEventListener('resize', updateCarouselMode);
  prefersReducedMotion.addEventListener('change', updateCarouselMode);
  coarsePointer.addEventListener('change', updateCarouselMode);
});
