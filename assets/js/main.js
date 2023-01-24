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

function isInViewport(element) {
  const rect = element.getBoundingClientRect();

  return (
    rect.top < window.innerHeight &&
    rect.left < window.innerWidth &&
    rect.bottom > 0 &&
    rect.right > 0
  );
}

function interactiveInit() {
  setTimeout(() => document.body.classList.add('js-loaded'));

  document.querySelectorAll('.js-half-onscreen-detect').forEach((element) => {
    element.classList.add('js-offscreen');

    setTimeout(() => {
      if (isInViewport(element)) {
        element.classList.remove('js-offscreen');
        element.classList.add('js-onscreen');
      }
    });
  });

  // Add the menu button toggling event listener
  addMenuToggleListener(document.querySelector('.c-menu-button'));
}

function addReferral(newReferralUrl) {
  if (!newReferralUrl) {
    return;
  }

  let existingReferralUrls = localStorage.getItem('referrals');

  // Add timestamp
  let datetime = new Date().toLocaleString('en-GB');
  datetime = datetime.replace(', ', '-');  // Comma,separated to hypen-separated
  datetime = datetime.replace(/:\d+$/g, '');  // Remove seconds from timestamp
  newReferralUrl += `-${datetime}`;

  if (!existingReferralUrls) {
    localStorage.setItem('referrals', newReferralUrl);
  } else if (existingReferralUrls.split(',').length < 20) {
    localStorage.setItem('referrals', existingReferralUrls + ',' + newReferralUrl);
  }
}

function checkIfFromGoogleAd() {
  const fromGoogleAdLocalStorage = localStorage.getItem('cpc');

  if (fromGoogleAdLocalStorage) {
    return true;
  }

  const urlSearchParams = new URLSearchParams(window.location.search);

  if (urlSearchParams.get('utm_medium') === 'cpc') {
    localStorage.setItem('cpc', true);
    return true;
  }

  return false;
}

function saveUtmSource() {
  const utm = new URL(window.location.href).searchParams.get('utm_source');

  if (utm) {
    localStorage.setItem('utm_source', utm);
  }
}

function addSourceToEmail() {
  const utm = localStorage.getItem('utm_source');

  if (!utm) {
    return;
  }

  const links = document.querySelectorAll('[href$="@wearelighthouse.com"]');
  links.forEach(link => link.href = link.href.replace('@', `+${utm.split('.')[0]}@`));
}

function swapEmailFromHelloToHi() {
  const fromGoogleAd = checkIfFromGoogleAd();

  if (!fromGoogleAd) {
    return;
  }

  const links = document.querySelectorAll('[href$="@wearelighthouse.com"]');

  links.forEach(link => {
    link.href = link.href.replace('hello', 'hi');
    link.innerText = link.innerText.replace('hello', 'hi');
  });
}

function saveThePrefillOrigin() {
  const prefillOrigin = new URLSearchParams(window.location.search).get('prefill_Origin');

  if (!prefillOrigin) {
    return;
  }

  sessionStorage.setItem('prefill_Origin', prefillOrigin);
}

function swapThePrefillOrigin() {
  const prefillOrigin = sessionStorage.getItem('prefill_Origin');

  if (prefillOrigin === null) {
    return;
  }

  const links = document.querySelectorAll('[href*="prefill_Origin"]');

  links.forEach(link => {
    const newUrl = new URL(link.href);
    const newSearchParams = new URLSearchParams(link.href);

    newSearchParams.set('prefill_Origin', prefillOrigin);
    newUrl.search = newSearchParams;
    link.href = newUrl;
  });
}

function completeInit() {
  setupObservers();
  addReferral(document.referrer);
  saveUtmSource();
  addSourceToEmail();
  swapEmailFromHelloToHi();
  saveThePrefillOrigin();
  swapThePrefillOrigin();
}

window.addEventListener('beforeunload', () => {
  document.body.classList.add('js-unloading');
});

function setupObservers() {
  const halfOnscreenObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('js-onscreen');
        entry.target.classList.remove('js-offscreen');
      }
    });
  }, { threshold: 0.45 });

  document.querySelectorAll('.js-half-onscreen-detect').forEach((element) => {
    halfOnscreenObserver.observe(element);
  });
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
