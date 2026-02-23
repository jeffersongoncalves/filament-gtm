<?php

namespace JeffersonGoncalves\Filament\Gtm\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use JeffersonGoncalves\Gtm\Settings\GtmSettings;

class ManageGtmSettings extends SettingsPage
{
    protected static string $settings = GtmSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    public static function getNavigationLabel(): string
    {
        return __('filament-gtm::pages.navigation_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-gtm::pages.navigation_group');
    }

    public function getTitle(): string
    {
        return __('filament-gtm::pages.title');
    }

    public function form(Form $form): Form
    {
        return $form
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
