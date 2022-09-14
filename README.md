# Lighthouse-WordPress-Theme

A WordPress Theme for the 2019 version of [wearelighthouse.com](https://wearelighthouse.com/)


## Local Development

### Prerequisites

- [Docker](https://www.docker.com/get-started)
- [Node.js & NPM](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/)


### Installation

1. Make a new folder to contain everything, and change directory into it.
   ```
   mkdir lighthouse && cd lighthouse
   ```

2. Download and extract the latest version of [WordPress](https://wordpress.org/download/).
   ```
   curl -o wordpress.zip https://wordpress.org/latest.zip &&
   unzip -q wordpress.zip &&
   rm -r wordpress.zip &&
   cp -r wordpress/. . &&
   rm -r wordpress
   ```

3. Clone this repo into the themes directory.
   ```
   cd wp-content/themes/ &&
   git clone https://github.com/wearelighthouse/Lighthouse-WordPress-Theme.git lighthouse &&
   cd lighthouse
   ```

4. Fetch the fonts (password is in the Lighthouse 1Pass)
   ```
   ./assets/font/fetch.sh
   ```

5. Create your own .env from .env.example - then if not using defaults, edit it to change the database details.
   ```
   cp .env.example .env
   ```

6. Install PHP dependencies.
   ```
   composer install
   ```

7. Install NPM dependencies.
   ```
   npm i
   ```

8. Start the docker container.
   ```
   make up
   ```

9. Get browserSync running and watching for local file changes.
   ```
   npm run watch
   ```

### Commands

#### Docker

`make up` - Start up the docker container, so that WordPress is accessible on localhost.

`make down` - Stop the docker container - it's recommended that this is done before switching to any other projects.  

`make bash` - Open up a CLI inside teh docker container - usful for debugging or checking that the correct dependencies are installed.  

See [Makefile](Makefile) for more.

#### Front-end

`npm run build` - Build production version of css, fonts, images, JavaScript, etc. into `/dist`.

`npm run watch` - Run local hot-reloading server on [localhost:3000](localhost:3000)`. This also builds resources into `/dist`, but without minification.

See [package.json](package.json) and [gulpfile.js](gulpfile.js) for more.

#### Notes

To do both start-up commands at once, you can `make up && npm run watch`. It's helpful to have an alias like `makerun` for that.

Both `npm run build` and `npm run watch` **remove** the `/dist` directory before re-creating it. It is also not a commited directory, so **do not** put important files in there manually. You can manually remove it with `rm -r dist/`.

### WordPress Setup

1. Go through the local WordPress installation. The `host` for your database is probably `db` not `localhost`.

2. Select the Lighthouse WordPress Theme in Appearance -> Themes.

3. To match the neat URLs on the live site, go to Settings -> Permalinks, then select 'Custom Structure', and paste in `/blog/%postname%/`.
   ![image](https://user-images.githubusercontent.com/462459/190123657-da72e0ba-22fb-4ca3-876e-9b43a0fd4de1.png)

4. We use the standard WordPress export/importer for copying over site data (Tools -> Export/Import). As the database is so large, it can struggle with images, so we either have to play around with `wp-config.php` ([related issue](https://github.com/wearelighthouse/Lighthouse-WordPress-Theme/issues/48)), or just add in aimages where they're needed to test with for local development.

5. We set static pages for the Homepage and the Posts page. To do that, if site data has been imported so the pages already exist, go to Settings -> Reading, and choose `Home` and `Blog`.
   ![image](https://user-images.githubusercontent.com/462459/190124381-f91b3099-24a4-4748-9fee-acd10ca6c97f.png)
   
6. The header navigation at the top of the site should be pulled through by the export/import, however it might not be selected to actually display in the right position. To check that, go to Appearance -> Settings, then check the 'Header Menu' Display location.

7. Footer info and Contact Details _are not_ pulled over with the export/import. The best way to do that right now is just to copy/paste the contents fo the metaboxes from the live site ([related issue](https://github.com/wearelighthouse/Lighthouse-WordPress-Theme/issues/49)).

8. For local development, `WP_DEBUG` should be changed from `false` to `true` inside `wp-config.php` (which sits at the top level of the WordPress installation folder structure)
   ```
   define( 'WP_DEBUG', true );
   ```
