const SliderController = {
  _current:  0,
  _total:    0,
  _timer:    null,
  _interval: 5000,

  init() {
    const track = document.getElementById('sliderTrack');
    if (!track) return;

    this._slides  = track.querySelectorAll('.slide');
    this._dots    = document.querySelectorAll('.slider-dot');
    this._total   = this._slides.length;

    document.getElementById('sliderPrev').addEventListener('click', () => this._prev());
    document.getElementById('sliderNext').addEventListener('click', () => this._next());

    this._dots.forEach(dot => {
      dot.addEventListener('click', () => this._goTo(+dot.dataset.index));
    });

    const wrapper = track.closest('.slider-wrapper');
    wrapper.addEventListener('mouseenter', () => this._stopAutoplay());
    wrapper.addEventListener('mouseleave', () => this._startAutoplay());
    wrapper.addEventListener('keydown', e => {
      if (e.key === 'ArrowLeft')  this._prev();
      if (e.key === 'ArrowRight') this._next();
    });

    this._bindSwipe(wrapper);
    this._startAutoplay();
  },

  _goTo(index) {
    this._slides[this._current].classList.remove('active');
    this._slides[this._current].setAttribute('aria-hidden', 'true');
    this._dots[this._current].classList.remove('active');

    this._current = (index + this._total) % this._total;

    this._slides[this._current].classList.add('active');
    this._slides[this._current].setAttribute('aria-hidden', 'false');
    this._dots[this._current].classList.add('active');
  },

  _next() { this._goTo(this._current + 1); },
  _prev() { this._goTo(this._current - 1); },

  _startAutoplay() {
    this._stopAutoplay();
    this._timer = setInterval(() => this._next(), this._interval);
  },

  _stopAutoplay() {
    clearInterval(this._timer);
    this._timer = null;
  },

  _bindSwipe(el) {
    let startX = 0;
    el.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    el.addEventListener('touchend',   e => {
      const diff = startX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 40) diff > 0 ? this._next() : this._prev();
    }, { passive: true });
  }
};

document.addEventListener('DOMContentLoaded', () => SliderController.init());
