<div class="filament-hidden">

![Filament Google Tag Manager](https://raw.githubusercontent.com/jeffersongoncalves/filament-gtm/master/art/jeffersongoncalves-filament-gtm.png)

</div>

# Filament Google Tag Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-gtm/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-gtm/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)

This Filament plugin provides seamless integration of Google Tag Manager into your Filament admin panels. It automatically injects GTM tracking code into your Filament application without requiring any manual template modifications. The plugin leverages Filament's render hooks to automatically add the necessary GTM scripts to the head and body sections of your admin panels, enabling you to track user interactions and gather valuable insights about your admin interface usage.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-gtm
```

## Usage

This package automatically integrates Google Tag Manager with your Filament admin panels. Once installed, it will automatically inject the necessary GTM scripts into all your Filament panels without any additional configuration.

The package depends on `jeffersongoncalves/laravel-gtm` for GTM configuration. Please refer to that package's documentation for setting up your GTM container ID and other GTM-specific configurations.

### Requirements

- PHP 8.2 or higher
- Laravel 11.0 or 12.0
- Filament 4.0 or higher

### Automatic Integration

The package automatically registers render hooks with Filament to inject GTM code:
- GTM head script is automatically added to the `<head>` section
- GTM body script is automatically added after the `<body>` tag

No manual template modifications are required.

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
