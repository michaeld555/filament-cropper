<?php

namespace Michaeld555\FilamentCropper;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCropperServiceProvider extends PackageServiceProvider
{

    public static string $name = 'filament-cropper';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasAssets()
            ->hasViews();
    }

    public function boot()
    {
        parent::boot();

    }

    public function packageBooted(): void
    {

        FilamentAsset::register([
            Css::make('filament-cropper-style', __DIR__ . '/../resources/dist/css/filament-cropper.css'),
        ], 'michaeld555/filament-cropper');
        
        FilamentAsset::register([
            AlpineComponent::make('filament-cropper-script', __DIR__ . '/../resources/dist/js/filament-cropper.js'),
        ], 'michaeld555/filament-cropper');

        FilamentAsset::register([
            AlpineComponent::make('filament-croppie-cropper-component-script', __DIR__ . '/../resources/dist/js/component.js'),
        ], 'michaeld555/filament-cropper');

    }
    
}
