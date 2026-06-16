document.addEventListener('DOMContentLoaded', () => {

  const carouselAll = Array.from(document.querySelectorAll('.carousel img'));
  const realImages = Array.from(document.querySelectorAll('.carousel img[data-real="1"]'));

  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const closeBtn = document.querySelector('.close');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');

  if (!realImages.length || !lightbox || !lightboxImg) return;

  let currentIndex = 0;

  /* ===============================
     FOTO CENTRALE ATTIVA (carousel)
     =============================== */
  function updateActiveImage() {
    const center = window.innerWidth / 2;

    carouselAll.forEach(img => {
      const rect = img.getBoundingClientRect();
      const imgCenter = rect.left + rect.width / 2;

      if (Math.abs(center - imgCenter) < rect.width / 2) {
        img.classList.add('active');
      } else {
        img.classList.remove('active');
      }
    });
  }

  setInterval(updateActiveImage, 120);
  window.addEventListener('resize', updateActiveImage);

  /* ===============================
     OPEN / CLOSE
     =============================== */
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

  /* ===============================
     CLICK → LIGHTBOX
     =============================== */
  carouselAll.forEach((img) => {
    img.addEventListener('click', () => {
      // Trova l'immagine cliccata tra quelle REALI
      const clickedSrc = img.src;
      const idx = realImages.findIndex(r => r.src === clickedSrc);

      // se clicchi su un duplicato -> apri comunque la corrispondente reale
      openLightbox(idx >= 0 ? idx : 0);
    });
  });

  /* ===============================
     CONTROLLI LIGHTBOX
     =============================== */
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
    if (e.target === lightbox) closeLightbox();
  });

  /* ===============================
     TASTIERA
     =============================== */
  document.addEventListener('keydown', (e) => {
    if (lightbox.style.display !== 'flex') return;

    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
    if (e.key === 'ArrowRight') showImage(currentIndex + 1);
  });

  /* ===============================
     SWIPE MOBILE
     =============================== */
  let startX = 0;
  let startY = 0;

  const SWIPE_MIN = 50;
  const VERTICAL_MAX = 80;

  lightboxImg.addEventListener('touchstart', (e) => {
    if (lightbox.style.display !== 'flex') return;
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
  }, { passive: true });

  lightboxImg.addEventListener('touchend', (e) => {
    if (lightbox.style.display !== 'flex') return;

    const endX = e.changedTouches[0].clientX;
    const endY = e.changedTouches[0].clientY;

    const diffX = endX - startX;
    const diffY = endY - startY;

    if (Math.abs(diffY) > VERTICAL_MAX) return;

    if (Math.abs(diffX) >= SWIPE_MIN) {
      if (diffX < 0) showImage(currentIndex + 1);
      else showImage(currentIndex - 1);
    }
  }, { passive: true });

});
