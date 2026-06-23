<?php

namespace JeffersonGoncalves\Filament\Gtm;

use Filament\View\PanelsRenderHook;
use JeffersonGoncalves\FilamentAnalyticsCore\AbstractAnalyticsServiceProvider;

class GtmServiceProvider extends AbstractAnalyticsServiceProvider
{
    protected function packageName(): string
    {
        return 'filament-gtm';
    }

    protected function renderHooks(): array
    {
        return [
            PanelsRenderHook::HEAD_START => 'gtm::head',
            PanelsRenderHook::BODY_START => 'gtm::body',
        ];
    }
}
