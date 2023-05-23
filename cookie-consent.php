<script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.9/dist/cookieconsent.js"></script>

<script>
  window.addEventListener('load', function(){
    var cc = initCookieConsent();

    cc.run({
      current_lang: 'en',
      autoclear_cookies: true,
      page_scripts: true,
      languages: {
        'en': {
          consent_modal: {
            title: 'Privacy settings',
            description: 'We use some functional cookies to improve your experience on our site, and some completely anonymised first party cookies which help us analyse site usage. You can read more about this in our <a class="cc-link" href="https://wearelighthouse.com/privacy-policy/">privacy policy</a>.',
            primary_btn: {
              text: 'Accept all',
              role: 'accept_all'              // 'accept_selected' or 'accept_all'
            },
            secondary_btn: {
              text: 'Settings',
              role: 'settings'        // 'settings' or 'accept_necessary'
            }
          },
          settings_modal: {
            title: 'Cookie preferences',
            save_settings_btn: 'Save settings',
            accept_all_btn: 'Accept all',
            reject_all_btn: 'Reject all',
            close_btn_label: 'Close',
            cookie_table_headers: [
              {col1: 'Name'},
              {col2: 'Domain'},
              {col3: 'Expiration'},
              {col4: 'Description'},
            ],
            blocks: [
              {
                title: 'Cookie usage 📢',
                description: 'We use cookies to ensure the basic functionalities of the website and to enhance your online experience. We don’t collect any personally identifiable information with our cookies. We use anonymised first party cookies which help us analyse site usage, and some functional third party cookies which are mainly there to tell us if you’re human or robot. 🤖 You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data, please read the full <a href="#" class="cc-link">privacy policy</a>.',
              },
              {
                title: 'Strictly necessary cookies',
                description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
                toggle: {
                  value: 'necessary',
                  enabled: true,
                  readonly: true          // cookie categories with readonly=true are all treated as "necessary cookies"
                },
              },
              {
                title: 'Performance and Analytics cookies',
                description: 'We collect anonymised data about our web traffic via Google Analytics 4 using first party cookies. This data is used internally to create statistics and analyse them so we can understand our users / their needs and optimise our site. GA4 does not log or store IP addresses, or collect any other personally identifiable information',
                toggle: {
                  value: 'analytics',     // your cookie category
                  enabled: false,
                  readonly: false,
                },
                cookie_table: [             // list of all expected cookies
                  {
                    col1: '^_ga',       // match all cookies starting with "_ga"
                    col2: 'google.com',
                    col3: '2 years',
                    col4: 'description ...',
                    is_regex: true,
                  },
                  {
                    col1: '_gid',
                    col2: 'google.com',
                    col3: '1 day',
                    col4: 'description ...',
                  },
                ]
              },
              {
                title: 'Advertisement and Targeting cookies',
                description: 'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
                toggle: {
                  value: 'targeting',
                  enabled: false,
                  readonly: false
                },
              },
              {
                title: 'More information',
                description: 'For any queries in relation to our policy on cookies and your choices, see our <a class="cc-link" href="https://wearelighthouse.com/privacy-policy/">privacy policy</a>.',
              },
            ],
          },
        },
      }
    });
  });
</script>
