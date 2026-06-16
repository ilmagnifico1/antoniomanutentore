document.addEventListener('DOMContentLoaded', () => {
  const carouselAll = Array.from(document.querySelectorAll('.carousel img'));
  const realImages = Array.from(document.querySelectorAll('.carousel img[data-real="1"]'));
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const closeBtn = document.querySelector('.close');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');

  if (!realImages.length || !lightbox || !lightboxImg || !closeBtn || !prevBtn || !nextBtn) {
    return;
  }

  let currentIndex = 0;

  function updateActiveImage() {
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

  carouselAll.forEach((img) => {
    img.addEventListener('click', () => {
      const clickedSrc = img.src;
      const idx = realImages.findIndex((realImage) => realImage.src === clickedSrc);
      openLightbox(idx >= 0 ? idx : 0);
    });
  });

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

  updateActiveImage();
  setInterval(updateActiveImage, 120);
  window.addEventListener('resize', updateActiveImage);
});
