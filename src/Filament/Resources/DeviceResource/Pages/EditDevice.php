<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\DeviceResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevice extends EditRecord
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
