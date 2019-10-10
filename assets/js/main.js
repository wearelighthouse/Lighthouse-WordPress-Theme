
if (document.readyState === "interactive" || document.readyState === "complete") {
  init();
} else {
  document.addEventListener('DOMContentLoaded', init);
}

function init() {
  addMenuToggleListener(document.querySelectorAll('.js-menu-button')[0]);
  document.addEventListener('keydown', (event) => {
    if (event.altKey && event.code === 'KeyA') {
      addressToClipboard();
    }
  });
  setTimeout(() => {
    document.body.classList.add('js-loaded');
  }, 0);
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
