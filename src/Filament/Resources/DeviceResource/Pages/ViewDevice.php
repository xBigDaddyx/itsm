<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\DeviceResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDevice extends ViewRecord
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
