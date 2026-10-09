<?php

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Foundation\Auth\User;
use JeffersonGoncalves\Filament\Gtm\GtmPlugin;
use JeffersonGoncalves\Filament\Gtm\Pages\ManageGtmSettings;
use JeffersonGoncalves\Gtm\Settings\GtmSettings;
use Livewire\Livewire;

beforeEach(function () {
    Filament::setCurrentPanel(Filament::getPanel('test'));
    $this->actingAs((new User)->forceFill(['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com']));
});

it('registers the settings page on the panel', function () {
    expect(Filament::getPanel('test')->getPages())->toContain(ManageGtmSettings::class)
        ->and(GtmPlugin::make()->getId())->toBe('filament-gtm');
});

it('ships translated labels', function () {
    expect(ManageGtmSettings::getNavigationLabel())->not->toContain('::')
        ->and((new ManageGtmSettings)->getTitle())->not->toContain('::');
});

it('saves the settings from the page', function () {
    Livewire::test(ManageGtmSettings::class)
        ->fillForm(['gtm_id' => 'GTM-TEST123'])
        ->call('save')
        ->assertHasNoFormErrors();

    $settings = app(GtmSettings::class)->refresh();
    expect($settings->gtm_id)->toBe('GTM-TEST123');
});

it('injects the script into the panel once configured', function () {
    $settings = app(GtmSettings::class);
    $settings->gtm_id = 'GTM-TEST123';
    $settings->save();

    $html = (string) FilamentView::renderHook(PanelsRenderHook::HEAD_START)
        .(string) FilamentView::renderHook(PanelsRenderHook::HEAD_END)
        .(string) FilamentView::renderHook(PanelsRenderHook::BODY_START)
        .(string) FilamentView::renderHook(PanelsRenderHook::BODY_END);

    expect($html)->toContain('GTM-TEST123');
});
