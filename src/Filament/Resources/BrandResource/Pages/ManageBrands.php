<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\BrandResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBrands extends ManageRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
