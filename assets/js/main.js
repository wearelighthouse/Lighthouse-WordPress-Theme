
if (document.readyState === "complete" || document.readyState === "loaded") {
  addMenuToggleListener(document.querySelectorAll('.js-menu-button')[0]);
} else {
  document.addEventListener('DOMContentLoaded', function() {
    addMenuToggleListener(document.querySelectorAll('.js-menu-button')[0]);
  });
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
  } else {
    // Close menu
    button.setAttribute('aria-checked', 'false');
    button.setAttribute('aria-label', 'Open Menu');
  }

  // John would prefer classList.replace(), but it's not in iOS Safari or IE11
  header.classList.toggle('c-header--mobile-menu-open');
  button.classList.toggle('c-menu-button--lines');
  button.classList.toggle('c-menu-button--close');
}
