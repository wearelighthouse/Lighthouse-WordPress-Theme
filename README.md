# Lighthouse-WordPress-Theme

A WordPress Theme for the 2019 version of [wearelighthouse.com](https://wearelighthouse.com/)


## Installation (for local development)

### Requires

- [Docker](https://www.docker.com/get-started)
- [Node.js & NPM](https://nodejs.org/en/)


### Step-by-step

1. Make a new folder to contain everything.
```
$ mkdir lighthouse
$ cd lighthouse
```

2. Download and extract the latest version of [WordPress](https://wordpress.org/download/).
```
$ curl -o wordpress.zip https://wordpress.org/latest.zip &&
  unzip -q wordpress.zip &&
  rm -r wordpress.zip &&
  cp -r wordpress/. . &&
  rm -r wordpress
```

3. Clone this repo into the themes directory.
```
$ cd wp-content/themes/ &&
  git clone https://github.com/wearelighthouse/Lighthouse-WordPress-Theme.git &&
  cd Lighthouse-Wordpress-Theme
```

4. Fetch the fonts
```
$ ./assets/font/fetch.sh
```

5. Create your own .env from .env.example - then edit it to change the database details.
```
$ cp .env.example .env
```

6. Install PHP dependencies.
```
$ composer install
```

7. Install NPM dependencies.
```
$ npm i
```

8. Start the docker container. See the [Makefile](/Makefile) for other docker commands.
```
$ make up
```

9. Get browserSync running and watching for local file changes. For other build tasks, see [gulpfile.js](/gulpfile.js).
```
$ npm run watch
```

10. If required, go through the local WordPress installation. The `host` for your database is probably `db` not `localhost`. Then select the Lighthouse WordPress Theme in the themes menu.
