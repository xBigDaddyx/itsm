<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\AssetResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAsset extends ViewRecord
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
