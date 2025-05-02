<div class="filament-hidden">

![Filament Google Tag Manager](https://raw.githubusercontent.com/jeffersongoncalves/filament-gtm/master/art/jeffersongoncalves-filament-gtm.png)

</div>

# Filament Google Tag Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-gtm/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-gtm/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)

This Filament plugin provides seamless integration of Google Tag Manager into your website or web application. It simplifies the process of adding and managing GTM tags, enabling you to effortlessly implement tracking, analytics, and marketing tags without modifying your site's core code. With this plugin, you can enhance your digital strategy by efficiently managing tags, tracking user interactions, and gathering valuable insights to optimize your website's performance.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-gtm
```

## Usage

Publish config file.

```bash
php artisan vendor:publish --tag=gtm-config
```

Add start head template.

```php
@include('gtm::head')
```

Add start body template.

```php
@include('gtm::body')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
