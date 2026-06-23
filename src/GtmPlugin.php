<?php

namespace JeffersonGoncalves\Filament\Gtm;

use JeffersonGoncalves\Filament\Gtm\Pages\ManageGtmSettings;
use JeffersonGoncalves\FilamentAnalyticsCore\AbstractAnalyticsPlugin;

class GtmPlugin extends AbstractAnalyticsPlugin
{
    public function getId(): string
    {
        return 'filament-gtm';
    }

    protected function getSettingsPageClass(): ?string
    {
        return ManageGtmSettings::class;
    }
}
