if (document.readyState === "interactive" || document.readyState === "complete") {
  init();
} else {
  document.addEventListener('DOMContentLoaded', init);
}

function setupObservers(lozad) {

  const observerLoad = lozad('.js-lazy', {
      rootMargin: '500px 0px',
      loaded: function(element) {
        element.parentNode.classList.add('js-child-loading');
        element.classList.add('js-loading');

        if (element.tagName === 'IMG') {
          element.addEventListener('load', (event) => {
            element.parentNode.classList.remove('js-child-loading');
            element.classList.remove('js-loading');
            element.parentNode.classList.add('js-child-loaded');
            element.classList.add('js-loaded');
          });
        } else if (element.tagName === 'VIDEO') {
          element.addEventListener('canplay', (event) => {
            element.parentNode.classList.remove('js-child-loading');
            element.classList.remove('js-loading');
            element.parentNode.classList.add('js-child-loaded');
            element.classList.add('js-loaded');
          });
        }
      }
  });
  observerLoad.observe();

  const observerView = lozad('.js-half-onscreen-detect', {
      threshold: 0.45,  // 'Technically' not ½, only requires 45% to be visible
      load: () => {},
      loaded: function(element) {
        element.classList.add('js-onscreen');
      }
  });
  observerView.observe();
}

function init() {

  // Add JavaScript-has-loaded class to body
  setTimeout(() => {
    document.body.classList.add('js-loaded');
  }, 0);

  // Add the menu button toggling event listener
  addMenuToggleListener(document.getElementsByClassName('js-menu-button')[0]);

  // Not all pages have lozad for lazy loading, but on pages that do, set it up
  if (window.lozad) {
    setupObservers(window.lozad);
  }

  // Add the keyboard shortcuts event listener
  document.addEventListener('keydown', (event) => {
    if (event.altKey && event.code === 'KeyA') {
      addressToClipboard();
    }
  });
}

window.addEventListener('beforeunload', function (e) {
  document.body.classList.add('js-unloading');
});

function addressToClipboard() {
  navigator.clipboard.writeText('Unit 29, Finsbury Business Center, 40 Bowling Green Lane, London EC1R 0NE');
}

function addMenuToggleListener(button) {
  button.addEventListener("click", toggleMenu);
}

function toggleMenu(e) {
  const header = document.getElementsByClassName('js-header')[0];
  let button = e.target;

  if (button.classList.toggle('js-menu-button--open')) {
    // Open menu
    button.setAttribute('aria-checked', 'true');
    button.setAttribute('aria-label', 'Close Menu');
    document.body.style.overflow = 'hidden';
  } else {
    // Close menu
    button.setAttribute('aria-checked', 'false');
    button.setAttribute('aria-label', 'Open Menu');
    document.body.style.overflow = '';
  }

  // John would prefer classList.replace(), but it's not in iOS Safari or IE11
  header.classList.toggle('c-header--mobile-menu-open');
  button.classList.toggle('c-menu-button--lines');
  button.classList.toggle('c-menu-button--close');
}
