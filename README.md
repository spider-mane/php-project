# Php Project

## A message to Russian 🇷🇺 people

If you currently live in Russia, please read [this message][link-to-russia].

[![Stand With Ukraine][banner-support-ukraine]][link-support-ukraine]

[![Russian Warship Go Fuck Yourself][ico-support-ukraine]][link-support-ukraine]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Purpose

Php Project, as the name implies is a simple starting point for php projects. It's a fork of `thephpleague/skeleton` with a few things grabbed from `spatie/package-skeleton-laravel`. It not only provides boilerplate for commonly needed package files, but can populate placeholders with your own project details.

## Installation

You can get started by using [Composer's](https://getcomposer.org/) `create-project` command.

```bash
composer create-project webtheory/php-project project-name
```

On Unix/Linux systems, you should automatically be prompted for your project information after installation. If not, or if installing on Windows, manually run the `prefill` interactive script in the console from your project root directory by entering:

```bash
php prefill
```

You'll then be asked a few questions that will allow Php Project to personalize the boilerplate with your info, initiate a new git repository, and update composer's autoload with your project's unique namespace.

## Folder Structure

Some commonly defined directories have been included and are merely suggestive. Delete what you don't need and rename and restructure as you wish.

```text
assets/
bench/
bin/
build/
config/
docs/
logs/
public/
spec/
src/
story/
templates/
tests/
vendor/
views/
```

## Development Tools

Php Project gets you started with an assortment of third-party tools that are useful for development and testing. Some of these will be redundant and you'll want to choose some over others. Simply delete any you don't need from the `require-dev` section of your `composer.json` and they'll be uninstalled the next time you run the `composer update` command. Information and documentation for each can be found at their websites linked below.

- ### Testing

  - [PHPUnit](https://phpunit.de)
  - [PhpSpec](http://phpspec.net)
  - [Behat](https://behat.org)
  - [Mockery](http://docs.mockery.io)
  - [Faker](https://fakerphp.github.io)
  - [PHPUnit Watcher](https://github.com/spatie/phpunit-watcher)
  - [PHPUnit Selenium](https://github.com/giorgiosironi/phpunit-selenium)

- ### Debugging

  - [Whoops](https://filp.github.io/whoops)
  - [Psysh](https://psysh.org)
  - [Symfony VarDumper](https://symfony.com/doc/current/components/var_dumper)
  - [PHP Debug Bar](http://phpdebugbar.com)
  - [Symfony ErrorHandler](https://github.com/symfony/error-handler)
  - [Collision](https://github.com/nunomaduro/collision)

- ### Coding Standards

  - [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)
  - [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
  - [Rector](https://getrector.org)
  - [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility)

- ### Static Analysis

  - [PHPStan](https://phpstan.org)
  - [Psalm](https://psalm.dev)
  - [PHPMD](https://phpmd.org/)
  - [PHP Depend](https://pdepend.org/)

- ### Linting

  - [PHP Parallel Lint](https://github.com/php-parallel-lint/PHP-Parallel-Lint)
  - [PHPLint](https://github.com/overtrue/phplint)

- ### Benchmarking

  - [PHPBench](https://phpbench.readthedocs.io)

- ### Build

  - [Composer Git Hooks](https://github.com/BrainMaestro/composer-git-hooks)
  - [Captain Hook](https://github.com/captainhookphp/captainhook)

## DevOps and Continuous Integration

Much of the included boilerplate is for CI and test automation services. All that's required of you is to register your project's repository with your preferred services and you're good to go. Check them out at:

- ### [Scrutinizer](https://scrutinizer-ci.com/)

- ### [Travis CI](https://www.travis-ci.com/)

- ### [CircleCI](https://circleci.com/)

## Composer Scripts

Php Project provides extra composer commands via composer scripts. These of course are simply mapped to the cli of some of the various development utilities included.

## Forking

If you find that you often make projects with a specific or more defined structure, you can simply fork "Php Project" and make your own additions. The `prefill` process is easily extended and the script itself can be modified to perform unique tasks. There are even simple task runners (`testprefill` and `testproject`) located in the `bin` directory that you can use to easily check that your customizations are functioning properly and showing up as expected.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Seclinkty

If you discover any seclinkty related issues, please email spider.mane.web@gmail.com instead of using the issue tracker.

## Credits

- [Chris Williams][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Notes

[ico-version]: https://img.shields.io/packagist/v/spider-mane/php-project.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-travis]: https://img.shields.io/travis/spider-mane/php-project/master.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/spider-mane/php-project.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/spider-mane/php-project.svg
[ico-downloads]: https://img.shields.io/packagist/dt/spider-mane/php-project.svg

[link-packagist]: https://packagist.org/packages/webtheory/php-project
[link-travis]: https://travis-ci.org/spider-mane/php-project
[link-scrutinizer]: https://scrutinizer-ci.com/g/spider-mane/php-project/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/spider-mane/php-project
[link-downloads]: https://packagist.org/packages/spider-mane/php-project
[link-author]: https://github.com/spider-mane
[link-contributors]: ../../contributors

<!-- Support Ukraine -->
[banner-support-ukraine]: https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg
[ico-support-ukraine]: https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/RussianWarship.svg
[link-support-ukraine]: https://stand-with-ukraine.pp.ua
[link-to-russia]: https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/ToRussianPeople.md
