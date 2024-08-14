<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\AssetCategoryResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAssetCategories extends ManageRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\AssetCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
