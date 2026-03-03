## Filament Google Tag Manager

Filament plugin for Google Tag Manager with a settings page powered by Spatie Laravel Settings. Manage your GTM container ID directly from the Filament admin panel. Automatically injects GTM scripts into both `<head>` and `<body>` sections.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-gtm:"^3.0"
</code-snippet>
@endverbatim

Publish and run the settings migrations:

@verbatim
<code-snippet name="Publish and run migrations" lang="bash">
php artisan vendor:publish --tag=gtm-settings-migrations
php artisan migrate
</code-snippet>
@endverbatim

### Register Plugin

@verbatim
<code-snippet name="Register in PanelProvider" lang="php">
use JeffersonGoncalves\Filament\Gtm\GtmPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            GtmPlugin::make(),
        ]);
}
</code-snippet>
@endverbatim

### Disable Settings Page

@verbatim
<code-snippet name="Disable the settings page" lang="php">
GtmPlugin::make()->settingsPage(false)
</code-snippet>
@endverbatim

### Features
- Settings page to configure GTM container ID
- Automatic injection of GTM scripts into both `<head>` (`PanelsRenderHook::HEAD_START`) and `<body>` (`PanelsRenderHook::BODY_START`)
- Uses `spatie/laravel-settings` for persistent settings storage
- Uses `jeffersongoncalves/laravel-gtm` as the core GTM package
- Supports translations via language files (`filament-gtm::pages.*`)

### Architecture
- `GtmPlugin` implements `Filament\Contracts\Plugin` and registers `ManageGtmSettings`
- `GtmServiceProvider` extends `PackageServiceProvider` and registers two render hooks (head and body)
- `ManageGtmSettings` extends `Filament\Pages\SettingsPage` with a single field: `gtm_id`
- Settings are stored via `JeffersonGoncalves\Gtm\Settings\GtmSettings` class

### Best Practices
- Publish GTM settings migrations before running `php artisan migrate`
- Use `settingsPage(false)` when you want automatic GTM injection without the admin UI
- The GTM container ID format is `GTM-XXXXXXX`
- GTM requires both head and body script injection -- this plugin handles both automatically
