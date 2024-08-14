<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\DeviceResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDevices extends ListRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
