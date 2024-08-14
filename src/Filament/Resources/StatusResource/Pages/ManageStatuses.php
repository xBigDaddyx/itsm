<?php

namespace Xbigdaddyx\Itsm\Filament\Resources\StatusResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatuses extends ManageRecords
{
    protected static string $resource = \Xbigdaddyx\Itsm\Filament\Resources\StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
