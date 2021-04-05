# Php Starter Project

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Php Project is a simple starting point for php projects forked from `thephpleague/skeleton` with a few things grabbed from `spatie/package-skeleton-laravel`. It not only provides boilerplate for commonly needed package files, but can populate their content with your own project details.

## Install

You can install via Composer

```bash
composer create-project webtheory/php-project project-name
```

On Unix/Linux systems, you should automatically be prompted for your project information after installation. If installing on Windows, manually run the `prefill` interactive script from your project root directory by entering:

```bash
php bin/prefill
```

## Structure

Some common directories have been included and are merely suggestive. Delete what you don't need and restructure as you wish.

```text
assets/
bin/
build/
config/
docs/
src/
tests/
vendor/
views/
```

## Fork

If you find that you often make projects with more a more defined structure, you can simply fork "Php Project" and make your own additions. The `prefill` php script is easy to customize and there are even tests (`testprefill` and `testproject`) located in the bin directory you can use to easily check that your customizations are showing up as expected.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email spider.mane.web@gmail.com instead of using the issue tracker.

## Credits

* [Chris Williams][link-author]
* [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/spider-mane/php-project.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/spider-mane/php-project/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/spider-mane/php-project.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/spider-mane/php-project.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/spider-mane/php-project.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/spider-mane/php-project
[link-travis]: https://travis-ci.org/spider-mane/php-project
[link-scrutinizer]: https://scrutinizer-ci.com/g/spider-mane/php-project/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/spider-mane/php-project
[link-downloads]: https://packagist.org/packages/spider-mane/php-project
[link-author]: https://github.com/spider-mane
[link-contributors]: ../../contributors
