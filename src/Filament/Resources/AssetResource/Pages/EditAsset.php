<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\AssetResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsset extends EditRecord
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
