<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\AssetResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssets extends ListRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
