if (document.readyState === "interactive" || document.readyState === "complete") {
  init();
} else {
  document.addEventListener('DOMContentLoaded', init);
}

function init() {

  // Add JavaScript-has-loaded class to body
  setTimeout(() => {
    document.body.classList.add('js-loaded');
  }, 0);

  // Add the menu button toggling event listener
  addMenuToggleListener(document.querySelectorAll('.js-menu-button')[0]);

  // Lazy loading
  const observer = window.lozad('.js-lazy', {
      rootMargin: '200px 0px', // syntax similar to that of CSS Margin
      threshold: 0.1, // ratio of element convergence
      loaded: function(element) {
        element.parentNode.classList.add('js-child-loading');
        element.classList.add('js-loading');

        element.onload = function() {
          element.parentNode.classList.add('js-child-loaded');
          element.classList.add('js-loaded');
        }
      }
  });
  observer.observe();

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
