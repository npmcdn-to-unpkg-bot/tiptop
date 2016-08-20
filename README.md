tiptop
======

A Symfony project created on February 28, 2016, 10:07 pm.
# tiptop

Installing the project
1. Clone project from git
2. Run php composer.phar update
3. Copy app/config/parameters.yml.dist to app/config/parameters.yml
4. Create DB and add config in app/config/parameters.yml
5. Create structure of DB. Run command:
    php bin/console doctrine:schema:create
6. Add DB content. Run command:
    php bin/console doctrine:fixtures:load