if (document.readyState === 'interactive' || document.readyState === 'complete') {
  interactiveInit();
} else {
  document.addEventListener('DOMContentLoaded', interactiveInit);
}

// Do image lazy loading after the rest of the page (and lozad JS) has loaded
if (document.readyState === 'complete') {
  completeInit();
} else {
  window.addEventListener('load', completeInit);
}

function interactiveInit() {
  // Add JavaScript-has-loaded class to body
  setTimeout(function() {
    document.body.classList.add('js-loaded');
  }, 0);

  // Add the menu button toggling event listener
  addMenuToggleListener(document.querySelector('.c-menu-button'));
}

function addReferral(newReferralUrl) {
  if (!newReferralUrl) {
    return;
  }

  let existingReferralUrls = localStorage.getItem('referrals');

  if (!existingReferralUrls) {
    localStorage.setItem('referrals', newReferralUrl);
  } else if (existingReferralUrls.split(',').length < 20) {
    localStorage.setItem('referrals', existingReferralUrls + ',' + newReferralUrl);
  }
}

function completeInit() {
  // Do lazy loading images
  setupObservers(window.lozad);
  // Add document.referrer into cache
  addReferral(document.referrer);
}

window.addEventListener('beforeunload', function (e) {
  document.body.classList.add('js-unloading');
});

function setupObservers(lozad) {
  let observerLoad = lozad('.js-lazy', {
      rootMargin: '500px 0px',
      loaded: function(element) {
        element.parentNode.classList.add('js-child-loading');
        element.classList.add('js-loading');

        if (element.tagName === 'IMG') {
          element.addEventListener('load', function(event) {
            element.parentNode.classList.remove('js-child-loading');
            element.classList.remove('js-loading');
            element.parentNode.classList.add('js-child-loaded');
            element.classList.add('js-loaded');
          });
        } else if (element.tagName === 'VIDEO') {
          element.addEventListener('canplay', function(event) {
            element.parentNode.classList.remove('js-child-loading');
            element.classList.remove('js-loading');
            element.parentNode.classList.add('js-child-loaded');
            element.classList.add('js-loaded');
          });
        }
      }
  });
  observerLoad.observe();

  document.querySelectorAll('.js-half-onscreen-detect').forEach(function(element) {
    element.classList.add('js-offscreen');
  });

  let observerView = lozad('.js-half-onscreen-detect', {
      threshold: 0.45,  // 'Technically' not ½, only requires 45% to be visible
      load: function() {},
      loaded: function(element) {
        element.classList.add('js-onscreen');
        element.classList.remove('js-offscreen');
      }
  });
  observerView.observe();
}

function addMenuToggleListener(button) {
  button.addEventListener('click', toggleMenu);
}

function toggleMenu(e) {
  let header = document.querySelector('.c-header');
  let button = e.target;

  if (button.getAttribute('aria-checked') === 'false') {
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
}
