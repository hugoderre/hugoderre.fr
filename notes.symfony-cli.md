# Symfony CLIs

## Start server
symfony serve

## Make controller
php bin/console make:controller ControllerName

## Create database (set db_name and encoding in .env file)
php bin/console doctrine:database:create

## Create entity
php bin/console make:entity

## Create migration
php bin/console make:migration
## Execute migration
php bin/console doctrine:migrations:migrate (Execute all migrations files)

## Fixture
php bin/console doctrine:fixtures:load



# Misc composer req

## ParamConverter
composer require sensio/framework-extra-bundle



# Webpack Encore 

## compile assets once
npm run dev

## or, recompile assets automatically when files change
npm run watch

## on deploy, create a production build
npm run build


# For server-side rendering, see React Build

php bin/console debug:config framework mailer (voir config possible d'un composant)
php bin/console debug:autowiring mail (voir services d'un composant)
php bin/console config:dump <name>