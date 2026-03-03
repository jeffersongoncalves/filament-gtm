---
name: filament-gtm-development
description: Build and work with Filament GTM plugin features, including Google Tag Manager settings page, automatic head and body script injection, and container ID management.
---

# Filament GTM Development

## When to use this skill

Use this skill when:
- Adding or modifying Google Tag Manager integration in a Filament panel
- Customizing the GTM settings page fields or behavior
- Debugging GTM script injection issues in head or body sections
- Working with the `GtmPlugin`, `ManageGtmSettings`, or `GtmServiceProvider` classes
- Managing GTM container IDs through the admin panel

## Package Overview

- **Package**: `jeffersongoncalves/filament-gtm` (branch `3.x` for Filament 5)
- **Namespace**: `JeffersonGoncalves\Filament\Gtm`
- **Dependencies**: `filament/filament:^5.0`, `filament/spatie-laravel-settings-plugin:^5.0`, `jeffersongoncalves/laravel-gtm:^2.0`
- **Service Provider**: `JeffersonGoncalves\Filament\Gtm\GtmServiceProvider`

## Version Compatibility

| Branch | Filament | PHP | Laravel |
|--------|----------|-----|---------|
| 1.x | 3.x | ^8.2 | ^11.0 |
| 2.x | 4.x | ^8.2 | ^11.0 |
| 3.x | 5.x | ^8.2 | ^11.0 |

## Configuration

### Basic Setup

Register the plugin in your `PanelProvider`:

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

### Disable Settings Page

If you only want automatic GTM injection without the admin settings page:

```php
GtmPlugin::make()->settingsPage(false)
```

### Migrations

Publish and run GTM settings migrations:

```bash
php artisan vendor:publish --tag=gtm-settings-migrations
php artisan migrate
```

## Architecture

### Plugin Class (`GtmPlugin`)

```php
namespace JeffersonGoncalves\Filament\Gtm;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\Filament\Gtm\Pages\ManageGtmSettings;

class GtmPlugin implements Plugin
{
    protected bool $hasSettingsPage = true;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        $plugin = filament(app(static::class)->getId());
        return $plugin;
    }

    public function getId(): string
    {
        return 'filament-gtm';
    }

    public function register(Panel $panel): void
    {
        if ($this->hasSettingsPage) {
            $panel->pages([
                ManageGtmSettings::class,
            ]);
        }
    }

    public function boot(Panel $panel): void {}

    public function settingsPage(bool $condition = true): static
    {
        $this->hasSettingsPage = $condition;
        return $this;
    }
}
```

### Service Provider (`GtmServiceProvider`)

The service provider registers **two** render hooks for GTM -- one in the head and one in the body. This is required by Google Tag Manager's implementation:

```php
namespace JeffersonGoncalves\Filament\Gtm;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GtmServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-gtm')
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        FilamentView::registerRenderHook(PanelsRenderHook::HEAD_START, fn (): View => view('gtm::head'));
        FilamentView::registerRenderHook(PanelsRenderHook::BODY_START, fn (): View => view('gtm::body'));
    }
}
```

### Settings Page (`ManageGtmSettings`)

The settings page has a single section with the GTM container ID field:

```php
namespace JeffersonGoncalves\Filament\Gtm\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\Gtm\Settings\GtmSettings;

class ManageGtmSettings extends SettingsPage
{
    protected static string $settings = GtmSettings::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-code-bracket';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->schema([
                Section::make(__('filament-gtm::pages.sections.gtm.heading'))
                    ->description(__('filament-gtm::pages.sections.gtm.description'))
                    ->schema([
                        TextInput::make('gtm_id')
                            ->label(__('filament-gtm::pages.fields.gtm_id.label'))
                            ->placeholder('GTM-XXXXXXX')
                            ->helperText(__('filament-gtm::pages.fields.gtm_id.helper')),
                    ]),
            ]);
    }
}
```

## Settings Fields

| Field | Type | Description |
|-------|------|-------------|
| `gtm_id` | TextInput | Google Tag Manager container ID (e.g., `GTM-XXXXXXX`) |

## Render Hooks

Unlike Fathom and Gtag which only inject into the `<head>`, GTM requires two injection points:

| Hook | View | Purpose |
|------|------|---------|
| `PanelsRenderHook::HEAD_START` | `gtm::head` | GTM JavaScript snippet in `<head>` |
| `PanelsRenderHook::BODY_START` | `gtm::body` | GTM noscript iframe after `<body>` |

## Translations

Translations are loaded from `filament-gtm::pages.*` namespace. Key translation keys:
- `filament-gtm::pages.navigation_label`
- `filament-gtm::pages.navigation_group`
- `filament-gtm::pages.title`
- `filament-gtm::pages.sections.gtm.heading`
- `filament-gtm::pages.sections.gtm.description`
- `filament-gtm::pages.fields.gtm_id.label`
- `filament-gtm::pages.fields.gtm_id.helper`

## Troubleshooting

### GTM scripts not injecting
**Cause**: The `gtm::head` or `gtm::body` views are not found, or the `laravel-gtm` base package is not installed.
**Solution**: Ensure `jeffersongoncalves/laravel-gtm:^2.0` is installed and service providers are discovered.

### Only head script injecting, body noscript missing
**Cause**: Both render hooks must be registered. The service provider registers both `HEAD_START` and `BODY_START`.
**Solution**: Verify that `GtmServiceProvider` is loaded. Check that both `gtm::head` and `gtm::body` views exist in the `laravel-gtm` package.

### Settings page not appearing
**Cause**: Migrations not published or run.
**Solution**: Run `php artisan vendor:publish --tag=gtm-settings-migrations` then `php artisan migrate`.

### GTM container ID format
**Cause**: Invalid container ID format.
**Solution**: The GTM container ID should follow the format `GTM-XXXXXXX` (e.g., `GTM-ABC1234`). Get it from your Google Tag Manager account.
