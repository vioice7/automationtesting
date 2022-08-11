# BDD, Behat, Mink and other Wonderful ThingsRESTing with Symfony

Well hi there! This repository holds the code and script for [Behat] and [Mink]

## Setup the Project

Ok, cool - this will be easy!

1. Make sure you have [Composer installed](https://getcomposer.org/).

2. In a terminal, move into the project, then install the composer dependencies:

```bash
composer install
```

Or you may need to run `php composer.phar install` - depending on *how*
you installed Composer. This will probably ask you some questions
about your database (answer for your system) and other settings
(just hit enter for these).

3. Load up your database

This project uses an Sqlite database, which normally is supported by PHP
out of the box.

To load up your database file, run:

```bash
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
```

This will create - and populate - an `app/app.db` file.

4. Start up the built-in PHP web server:

```bash
php app/console server:run
```

Then find the site at http://localhost:8000.

You can login with:

user: admin
pass: admin

5. Start up the Java Selenium server

`java -jar -Dwebdriver.firefox.driver="/home/<location>/drivers/geckodriver" selenium-server-<version>.jar -debug`

6. Have fun all!
7. Have fun all!
8. Have fun all!
9. Have fun all!
10. Have fun all!