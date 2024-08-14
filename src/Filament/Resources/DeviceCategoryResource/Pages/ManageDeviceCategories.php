<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\DeviceCategoryResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDeviceCategories extends ManageRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\DeviceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
