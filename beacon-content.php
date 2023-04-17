<?php

// Minify SVG from designs: https://jakearchibald.github.io/svgomg/
// Fix conflicting SVG gradient IDs: https://codepen.io/burntcustard/pen/ZEqOJNB

$content = [
  'flickering' => [
    'intro' => "This typically means your teams decision making is based on assumptions from stakeholders with no input or research from users. Features are implemented as and when requested regardless of value to customer.",
    'sections' => [
      'Purpose' => "Usually at this level, decisions are made from the top down with no team or user involvement. There's often no roadmap created or shared which results in a disconnect for the team who don't understand what they're working towards.",
      'People' => "Often we see teams that are siloed and unsure of their responsibilities. This can be the case both within and across teams. Lack of resources and duplication can be common as team members take on unnecessary work.",
      'Process' => "Generally we find at this level that no methods of user research are utilised or understood, resulting in no research data to aid in decision making. 'Design' is often thought to be high-fidelity designs only.",
    ],
    'actions' => [
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75"><path fill="#151931" d="M27.94 26.92c6.72 3 12.08 8.89 14.5 18.66l.6 2.42H40.2c-8.54 0-16.02-.65-21.98-3.6-6.11-3-10.26-8.22-12.67-16.55l-.56-1.94 2.24-.48c6.53-1.4 14.09-1.46 20.72 1.5Z"/><path fill="url(#a)" d="M40.25 21.39c-5.95 6.22-7.88 15.34-4.56 26.13l.42 1.35h1.4c7.15 0 15.5-3.43 21.74-9.34 6.29-5.95 10.57-14.56 9.21-24.92l-.2-1.57-1.56-.1c-11.1-.66-20.57 2.3-26.45 8.45Z"/><path fill="url(#b)" d="M32.3 46.2h10.75v19.51H32.3z"/><defs><linearGradient id="a" x1="68.41" x2="42.21" y1="30.2" y2="46.39" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity=".01"/></linearGradient><linearGradient id="b" x1="38.78" x2="50.44" y1="67.72" y2="61.3" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity=".01"/></linearGradient></defs></svg>',
        'title' => "Seed UCD",
        'text' => "Raise and build awareness for UCD within the business by identifying allies to support avocacy.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><circle cx="20" cy="18.7" r="11.8" fill="url(#c)" opacity=".5"/><path fill="url(#d)" d="m8.2 43.1 26 26 26-26h-52Z"/><path fill="url(#e)" d="M34.2 69.1 21 56.1l33.7-33.8 13.1 13.1-33.7 33.7Z"/><defs><linearGradient id="c" x1="20" x2="36.6" y1="35.4" y2="18.7" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="d" x1="19" x2="-7.2" y1="20.1" y2="76.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="e" x1="75.3" x2="108" y1="84.8" y2="4.6" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Training',
        'text' => "Source the skills needed. This could be by upskilling your existing team with training, hiring specialists or enlisting outside help to get the process started",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" fill="none" viewBox="0 0 77 77"><circle cx="38.4" cy="22.36" r="14.86" fill="#151931"/><path fill="url(#f)" fill-rule="evenodd" d="M34.21 39.81A28.57 28.57 0 0 0 9.83 68.07h57.14a28.57 28.57 0 0 0-24.38-28.26l-4.19 13.4-4.19-13.4Z" clip-rule="evenodd"/><defs><linearGradient id="f" x1="37.3" x2="52.69" y1="72.61" y2="41.66" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity=".01"/></linearGradient></defs></svg>',
        'title' => 'Stakeholder buy-in',
        'text' => "Make sure stakeholders understand the importance of user-centric practises and how it will benefit the business.",
      ],
    ],
  ],
  'faint' => [
    'intro' => "This typically means that your team have given some consideration to users. However, data can often be misinterpreted or used only to solve specific problems rather than inform wider strategy and direction.",
    'sections' => [
      'Purpose' => "At this level, user research is usually not primary data and can be used biasedly. It is used to solve immediate issues on a small scale. A roadmap often exists but is not formal and is short sighted in its objectives.",
      'People' => "We find that teams at this level understand some roles more than others, which can result in a mismatch of velocity in different areas of the team. Access to training can be limited and team members aren't always confident sharing honest opinons.",
      'Process' => "Desk research, secondary data or feedback from ticketing systems are commonly the only source of user data. Sometimes there may be a dedicated designer within the team but they'll often have limited to no research skills. Designs are typically created directly from user feedback at face value without iteration.",
    ],
    'actions' => [
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><circle cx="33.8" cy="19.3" r="14.7" fill="#151931"/><path fill="url(#g)" d="M34.8 36.2a28.4 28.4 0 0 1 28.5 28.2h-57a28.4 28.4 0 0 1 28.5-28.2Z"/><path fill="url(#h)" d="m75 68.1-7.2 7.3-8.7-8.8 7.2-7.2 8.8 8.7Z"/><circle cx="55.4" cy="55.3" r="13.9" fill="url(#i)" transform="rotate(135 55.4 55.3)"/><defs><linearGradient id="g" x1="28.9" x2="13.1" y1="67.3" y2="35.3" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="h" x1="68.7" x2="80" y1="77" y2="65.7" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient><linearGradient id="i" x1="45.8" x2="69.3" y1="37.3" y2="64.9" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient></defs></svg>',
        'title' => 'Understanding users',
        'text' => "Begin to introduce more UCD activities, to help build an understanding of users.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="none" viewBox="0 0 76 76"><circle cx="38.2" cy="37.9" r="29.7" stroke="url(#j)" stroke-width="12.5" transform="rotate(135 38.2 37.9)"/><circle cx="37.7" cy="27.7" r="7.4" fill="#151931"/><path fill="url(#k)" d="M38.2 36.3c8 0 14.4 6.4 14.4 14.3H23.7c0-8 6.5-14.3 14.5-14.3Z"/><defs><linearGradient id="j" x1="25.3" x2="66.2" y1="-8.7" y2="74.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient><linearGradient id="k" x1="35.2" x2="27.2" y1="52" y2="35.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Cultivate user-centric culture',
        'text' => "Create a more user-centric culture, by starting to involve non-designers in the discovery and design process. Encourage senior leadership
        and engineers to speak to users, or listen into user research.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><path fill="url(#l)" d="M72.08 37.87 57.66 23.46v9.41H21v-9.41L6.71 37.87l14.3 14.44v-9.44h36.65v9.44l14.42-14.44Z"/><path fill="url(#m)" d="M39.38 5.2 24.97 19.62h9.41v36.65h-9.41l14.41 14.3 14.44-14.3h-9.44V19.62h9.44L39.38 5.2Z"/><defs><linearGradient id="l" x1="9.62" x2="69.2" y1="49.04" y2="69.73" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity=".01"/></linearGradient><linearGradient id="m" x1="46.73" x2="73.48" y1="59.72" y2="32.39" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity=".01"/></linearGradient></defs></svg>',
        'title' => 'Raise awareness',
        'text' => "Create case studies of successful UX projects, to build awareness but also people who can champion UX internally.",
      ],
    ],
  ],
  'emerging' => [
    'intro' => "This typically means your team have a basic understanding of and use user-centric practises. Roadmaps are often arbitrary and aren't understood or remembered by the team.",
    'sections' => [
      'Purpose' => "Commonly teams at this level consider user insights but they are not central when forming strategy. Product visions & roadmaps have been defined but usually have little impact due to lack of review and iteration.",
      'People' => "For emerging teams, individuals usually understand what is expected of them, but need to be encouraged to collaborate. Generally, estimates and team velocity is loosely tracked but often does not match expectations for team members or the roadmap.",
      'Process' => "It is common for some basic, ad-hoc forms of research to be used, but are often only conducted by a select few in the team. Results are typically not widely shared and necessary tools can be viewed as not valuable. Physical design assets are usually seen as more valuable than user insights.",
    ],
    'actions' => [
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="75" height="76" fill="none" viewBox="0 0 75 76"><circle cx="37.5" cy="37.9" r="29.7" stroke="url(#n)" stroke-width="12.5" transform="rotate(135 37.5 37.9)"/><path fill="#151931" d="M23 41v11.2h11.2L23 41.1Z"/><path fill="url(#o)" d="M36.9 49.4 25.5 38.1l19.2-19.2L56 30.3 37 49.4Z"/><defs><linearGradient id="n" x1="28.6" x2="78.8" y1="1.1" y2="87.4" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient><linearGradient id="o" x1="43.9" x2="65.5" y1="52.6" y2="31" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Culture around UX',
        'text' => "Focus on continuing to build and maintain a healthy design culture at all levels of the organisation. Encourage guilds or working groups
        for people interested in UX.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><circle cx="22" cy="56.7" r="12.6" fill="url(#p)"/><path fill="url(#q)" d="M71.2 59.1 61 69.3 40.4 48.8l10.3-10.2L71.2 59Z"/><circle cx="34.5" cy="30.3" r="25.9" fill="url(#r)" transform="rotate(135 34.5 30.3)"/><defs><linearGradient id="p" x1="9.7" x2="53.4" y1="56.3" y2="79.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="q" x1="57.6" x2="77.6" y1="68.6" y2="48.5" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient><linearGradient id="r" x1="14.8" x2="51.5" y1="10.5" y2="53.2" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient></defs></svg>',
        'title' => 'Research',
        'text' => "Use design and insights from research, to more heavily influence the organisational roadmap where possible. Use case studies and projects
        to tell compelling stories of how design can make a tangible difference to the bottom-line.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="none" viewBox="0 0 76 76"><path fill="url(#s)" d="M1.8 27H63v37.9H1.8z"/><path stroke="url(#t)" stroke-width="9.4" d="M20.8 27.3V14.8H44v12.5"/><path fill="#151931" d="M38 46v11h11.2L38 46Z"/><path fill="url(#u)" d="M52.2 54.3 40.8 43 64 19.8l11.3 11.4-23.1 23.1Z"/><defs><linearGradient id="s" x1="-4.6" x2="64.5" y1="45.9" y2="26.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="t" x1="39.2" x2="23" y1="28.9" y2="-9.5" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="u" x1="63.7" x2="85.3" y1="53" y2="31.4" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient></defs></svg>',
        'title' => 'UX + Business',
        'text' => "Be specifc with the benefits of design; use analytics and the language of the business, to ensure design and UX is taken seriously
        alongside other disciplines.",
      ],
    ],
  ],
  'bright' => [
    'intro' => "This typically means your team is data-driven and using user research to drive a product strategy that links directly into business goals. Product vision is clear and acts as a guide post for decision making",
    'sections' => [
      'Purpose' => "User insights are typically seen as key to decision making and forming strategy for Bright teams. KPIs and metrics are often included to track launches and reviewed regularly. These teams usually feel confident defining work based on product vision.",
      'People' => "Team responsibilities are often well established and expectations are being met. They generally work collaboratively within individual product teams but routinely have limited amounts of natural cross-collaboration at the organisational level. Team velocity and expectations are usually tracked and well matched.",
      'Process' => "Typically, a number of research methods are used by experienced individuals. Results are documented and made available to anyone wishing the access them. A selection of tools are usually available as well as utilization of sketching and early feedback before proceeding to high-fidelity designs.",
    ],
    'actions' => [
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="75" height="76" viewBox="0 0 75 76"><path fill="url(#v)" d="M51.6 23.8H2.3v30.5h28.2v14l14-14h7V23.8Z"/><path fill="url(#w)" d="M75 9.8H25.8v30.4h28.1l14 14v-14H75V9.8Z"/><defs><linearGradient id="v" x1="47.5" x2="-4.3" y1="36" y2="74.5" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="w" x1="-42.8" x2="105.3" y1="54.3" y2="56.4" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Collaboration',
        'text' => "Build on the existing team and processes, by encouraging a collaborative culture without silos. Encourage designers, researchers and
        product people to regularly share success and failure stories. ",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><path fill="url(#x)" fill-rule="evenodd" d="M51.6 6.6H56v3c2 .4 3.6 1.1 5.1 2.2l2.2-2.2 3.1 3.2-2.1 2.1c1 1.5 1.8 3.2 2 5h3.1v4.5h-3c-.3 2-1 3.6-2.1 5.1l2.1 2.2-3.1 3.1-2.2-2.1c-1.5 1-3.2 1.8-5 2v3.1h-4.5v-3c-1.9-.3-3.6-1-5-2.1l-2.2 2.1-3.2-3.1 2.2-2.2a15 15 0 0 1-2.2-5h-3V20h3a13 13 0 0 1 2.2-5.1l-2.2-2.1 3.2-3.2 2.1 2.2a15 15 0 0 1 5-2.2v-3Z" clip-rule="evenodd"/><path fill="url(#y)" d="m33.4 28.6 5.4 2-1.2 3C40 35 41.8 37 43.3 39l2.8-1.2 2.4 5.3-3 1.3c.7 2.5.8 5.2.2 7.8l3 1.1-2.1 5.5-3-1.2a17.4 17.4 0 0 1-5.4 5.6l1.3 3-5.4 2.3-1.2-3c-2.6.7-5.2.8-7.9.2l-1.1 3-5.4-2.2 1.1-2.9a17.4 17.4 0 0 1-5.6-5.4l-3 1.2-2.3-5.3 2.9-1.3a17 17 0 0 1-.2-7.8l-3-1.1 2.2-5.4 3 1.1A16 16 0 0 1 19 34l-1.3-3 5.3-2.2 1.3 2.8c2.5-.6 5.2-.7 7.8-.1l1.2-3Z"/><defs><linearGradient id="x" x1="-5.2" x2="88.6" y1="37.8" y2="39" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="y" x1="47.8" x2="-6.2" y1="46.2" y2="58.2" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Design Ops',
        'text' => "Ensure that design practices continue to improve at scale, by focussing on how you can utilise design ops and designers in management
        roles.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><circle cx="22.9" cy="20.6" r="14.8" fill="url(#z)" opacity=".5"/><path fill="url(#aa)" d="M35 71 22 20l52 13-39 38Z"/><defs><linearGradient id="z" x1="16.1" x2="50.8" y1="40.6" y2="24.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="aa" x1="22.4" x2="61.9" y1="44.6" y2="76.2" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'UX Strategy',
        'text' => "Be proactive with a UX strategy, and ensure it aligns to the wider organisal objectives. Push to ensure product, design and engineering
        are treated as equals.",
      ],
    ],
  ],
  'luminous' => [
    'intro' => "This typically means that your team are effectively including user-centred practises at all stages of product development. The team is empowered, efficient and fully understand the goals they're working toward to achieve success.",
    'sections' => [
      'Purpose' => "We often find teams at this level are making product decisions that are fundamentally user-centric and such practises are seen as important to the business. Roadmaps normally exists at a team level and organisation level to connect into a wider strategy.",
      'People' => "A trusting and open feedback culture is usually fostered by the team, as well as collaboration across the organisation. They commonly have good access to resources and training, with clear structure and expectations.",
      'Process' => "A variety of research methods are often used and conducted by specialists throughout product development. Typically, results are shared beyond the team. Brainstorming, sketching and ideation are encouraged and a design system is in place to ensure consistency of outputs.",
    ],
    'actions' => [
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="75" height="76" viewBox="0 0 75 76"><circle cx="12.4" cy="37.9" r="7.9" fill="#151931" transform="rotate(-174 12.4 37.9)"/><circle cx="54.1" cy="55.1" r="7.9" fill="url(#ab)" transform="rotate(51 54 55.1)"/><circle cx="19.6" cy="55.1" r="7.9" fill="url(#ac)" transform="rotate(141 19.6 55.1)"/><circle cx="61.2" cy="37.9" r="7.9" fill="url(#ad)" transform="rotate(-174 61.2 37.9)"/><circle cx="36.8" cy="62.3" r="7.9" fill="#151931" transform="rotate(96 36.8 62.3)"/><circle cx="36.8" cy="13.5" r="7.9" fill="url(#ae)" transform="rotate(96 36.8 13.5)"/><circle cx="19.6" cy="20.6" r="7.9" fill="url(#af)" transform="rotate(51 19.6 20.6)"/><circle cx="54.1" cy="20.6" r="7.9" fill="#151931" transform="rotate(141 54.1 20.6)"/><defs><linearGradient id="ab" x1="46.2" x2="62" y1="63.1" y2="63.1" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="ac" x1="11.7" x2="27.5" y1="63.1" y2="63.1" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="ad" x1="53.3" x2="69.2" y1="45.8" y2="45.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="ae" x1="28.9" x2="44.8" y1="21.4" y2="21.4" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="af" x1="11.7" x2="27.5" y1="28.6" y2="28.6" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Community',
        'text' => "Be proud of your culture and processes, and use it to foster development and recruitment. Encourage designers to share case studies
        externally and be actively involved in the product and design community.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76"><path fill="url(#ag)" d="M35.7 64.8 14 45.7l29.7-33.8 21.7 19-29.7 33.9Z" opacity=".5"/><circle cx="24.8" cy="55.2" r="14.4" fill="url(#ah)" transform="rotate(-174 24.8 55.2)"/><path fill="#151931" d="m63.4 10-19.7 2 21.6 19-2-21Z"/><defs><linearGradient id="ag" x1="43.3" x2="20.2" y1="10" y2="32.9" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient><linearGradient id="ah" x1="10.4" x2="39.3" y1="69.6" y2="69.6" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Push growth',
        'text' => "Don't get complacent; continue to encourage growth in the team, by pushing development into less obvious specialisms and areas of design
        and research.",
      ],
      [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="none" viewBox="0 0 76 76"><circle cx="38.2" cy="37.9" r="29.7" stroke="url(#ai)" stroke-width="12.5" transform="rotate(135 38.2 37.9)"/><circle cx="37.7" cy="27.7" r="7.4" fill="#151931"/><path fill="url(#aj)" d="M38.2 36.3c8 0 14.4 6.4 14.4 14.3H23.7c0-8 6.5-14.3 14.5-14.3Z"/><defs><linearGradient id="ai" x1="25.3" x2="66.2" y1="-8.7" y2="74.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#fff"/></linearGradient><linearGradient id="aj" x1="35.2" x2="27.2" y1="52" y2="35.8" gradientUnits="userSpaceOnUse"><stop stop-color="#151931"/><stop offset="1" stop-color="#151931" stop-opacity="0"/></linearGradient></defs></svg>',
        'title' => 'Onward with user-centricity',
        'text' => "Focus on establishing and maintaining user-centred outcome metrics at the highest levels of your organisation.",
      ],
    ],
  ],
];
