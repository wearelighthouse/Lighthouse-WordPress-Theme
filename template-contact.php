<?php
  /* Template Name: Contact */

  // Get the contact page link block things
  $blocks = getPostMeta('contact_template_contact_template_blocks');

  // Get the spritesheet URL
  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin s-content">
        <?php the_content(); ?>
      </div>

      <?php if ($blocks) : ?>
        <div class="o-container-content o-container-content--v-margin o-container-services o-container-services--3-column">
          <?php foreach ($blocks as $block) : ?>
            <a href="<?= isset($block['link_url']) ? $block['link_url'] : '' ?>" class="c-contact-block">
              <div class="c-social-link c-social-link--dark">
                <svg viewBox="0 0 40 40" style="display: block; height: 40px; width: 40px;">
                  <use xlink:href="<?= $svgSpriteSheet ?>#icon--<?= strToLower($block['type']) ?>"></use>
                </svg>
              </div>
              <?php if (isset($block['title'])) : ?>
                <h4 class="c-contact-block__title">
                  <?= $block['title'] ?>
                </h4>
              <?php endif; ?>
              <?php if (isset($block['text'])) : ?>
                <p class="c-contact-block__text">
                  <?= $block['text'] ?>
                </p>
              <?php endif; ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </section>

    <section class="o-container-section o-container-section--bordered">
      <div id="map" style="height:600px;"></div>
      <script>
        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 51.524756, lng: -0.10722099999998},
            zoom: 13,
            styles: [
              {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "color": "#444444"
                  }
                ]
              },
              {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                  {
                    "color": "#f2f2f2"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                  {
                    "saturation": -100
                  },
                  {
                    "lightness": 45
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "simplified"
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                  {
                    "color": "#46bcec"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              }
            ]
          });
          var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            title: "Lighthouse",
            icon: {
              anchor: new google.maps.Point(5, 5),
              size: new google.maps.Size(60,60),
              url: '<?= get_stylesheet_directory_uri() ?>/dist/svg/lighthouse-marker.svg'
            }
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPy3QpRscekSHWgNohLqPkyW1JIXTuIc8&callback=initMap"
      async defer></script>

    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
