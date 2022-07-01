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
  setTimeout(function () {
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

function swapEmailFromHelloToHi() {
  const fromGoogleAd = checkIfFromGoogleAd();

  if (!fromGoogleAd) {
    return;
  }

  const links = document.querySelectorAll('[href="mailto:hello@wearelighthouse.com"]');

  links.forEach(link => {
    link.href = link.href.replace('hello@wearelighthouse.com', 'hi@wearelighthouse.com');
    link.innerText = link.innerText.replace('hello@wearelighthouse.com', 'hi@wearelighthouse.com');
  });
}

function storeThePrefillOrigin() {
  sessionStorage.setItem('prefill_Origin', "If%20You%20Could");

  let getElement = document.querySelectorAll('.c-content-grid');

  getElement.forEach(element => {
    let para = element.querySelectorAll('p');

    para.forEach(el => {
      let anchor = el.querySelectorAll('a');
      anchor.forEach(an => {
        let link = an.getAttribute('href');
        
        if (!link.includes('prefill_Origin')) {
          const getSession = sessionStorage.getItem('prefill_Origin');
          let appendUrl = `${link}&prefill_Origin=${getSession}`;
          console.log(appendUrl);
        }
      })
    })

  })
}

function completeInit() {
  // Do lazy loading images
  setupObservers(window.lozad);
  // Add document.referrer into cache
  addReferral(document.referrer);
  swapEmailFromHelloToHi();
  storeThePrefillOrigin();
}

window.addEventListener('beforeunload', function (e) {
  document.body.classList.add('js-unloading');
});

function setupObservers(lozad) {
  let observerLoad = lozad('.js-lazy', {
    rootMargin: '500px 0px',
    loaded: function (element) {
      element.parentNode.classList.add('js-child-loading');
      element.classList.add('js-loading');

      if (element.tagName === 'IMG') {
        element.addEventListener('load', function (event) {
          element.parentNode.classList.remove('js-child-loading');
          element.classList.remove('js-loading');
          element.parentNode.classList.add('js-child-loaded');
          element.classList.add('js-loaded');
        });
      } else if (element.tagName === 'VIDEO') {
        element.addEventListener('canplay', function (event) {
          element.parentNode.classList.remove('js-child-loading');
          element.classList.remove('js-loading');
          element.parentNode.classList.add('js-child-loaded');
          element.classList.add('js-loaded');
        });
      }
    }
  });
  observerLoad.observe();

  document.querySelectorAll('.js-half-onscreen-detect').forEach(function (element) {
    element.classList.add('js-offscreen');
  });

  let observerView = lozad('.js-half-onscreen-detect', {
    threshold: 0.45,  // 'Technically' not ½, only requires 45% to be visible
    load: function () { },
    loaded: function (element) {
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
