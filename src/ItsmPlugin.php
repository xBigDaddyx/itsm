<?php

namespace Xbigdaddyx\Itsm;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Xbigdaddyx\Itsm\Filament\Pages\Tenancy\EditCompanyProfile;
use Xbigdaddyx\Itsm\Filament\Pages\Tenancy\RegisterCompany;
use Xbigdaddyx\Itsm\Filament\Resources\AssetCategoryResource;
use Xbigdaddyx\Itsm\Filament\Resources\AssetResource;
use Xbigdaddyx\Itsm\Filament\Resources\BrandResource;
use Xbigdaddyx\Itsm\Filament\Resources\CompanyResource;
use Xbigdaddyx\Itsm\Filament\Resources\DeviceCategoryResource;
use Xbigdaddyx\Itsm\Filament\Resources\DeviceResource;
use Xbigdaddyx\Itsm\Filament\Resources\StatusResource;
use Xbigdaddyx\Itsm\Filament\Resources\UserResource;
use Xbigdaddyx\Itsm\Traits\HasBaseModels;

class ItsmPlugin implements Plugin
{



    public function getId(): string
    {
        return 'itsm';
    }

    public function register(Panel $panel): void
    {

        $panel->pages([
            //

        ])
            ->resources([
                AssetCategoryResource::class,
                DeviceCategoryResource::class,
                BrandResource::class,
                StatusResource::class,
                DeviceResource::class,
                AssetResource::class,
            ]);
    }

    public function boot(Panel $panel): void {}

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
