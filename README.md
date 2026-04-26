<div class="filament-hidden">

![Filament Gtm](https://raw.githubusercontent.com/jeffersongoncalves/filament-gtm/3.x/art/jeffersongoncalves-filament-gtm.png)

</div>

# Filament Google Tag Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-gtm/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-gtm/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-gtm.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-gtm)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-gtm.svg?style=flat-square)](LICENSE.md)

Filament plugin for Google Tag Manager with a settings page powered by [Spatie Laravel Settings](https://github.com/spatie/laravel-settings). Manage your GTM container ID directly from the Filament admin panel.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-gtm:"^3.0"
```

Publish the settings migrations and run them:

```bash
php artisan vendor:publish --tag=gtm-settings-migrations
php artisan migrate
```

## Usage

### Register the Plugin

Add the plugin to your Filament panel provider:

```php
use JeffersonGoncalves\Filament\Gtm\GtmPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            GtmPlugin::make(),
        ]);
}
```

The plugin will:
- Register a **Settings Page** where you can manage your GTM container ID
- Automatically inject GTM scripts into the `<head>` and `<body>` sections of your Filament panels

### Customization

#### Disable Settings Page

If you only want the automatic GTM injection without the settings page:

```php
GtmPlugin::make()
    ->settingsPage(false),
```

### Requirements

- PHP 8.2 or higher
- Filament 5.0
- Laravel 11.0 or higher

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
