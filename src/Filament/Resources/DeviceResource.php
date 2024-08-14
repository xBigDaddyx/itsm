<?php

namespace Xbigdaddyx\Itsm\Filament\Resources;

use App\Filament\AssetManagement\Resources\DeviceResource\Pages;
use App\Filament\AssetManagement\Resources\DeviceResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeviceResource extends Resource
{
    protected static ?string $model = \Xbigdaddyx\Itsm\Models\Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-tv';
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'type', 'serial_number'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category->name,
            'Brand' => $record->brand->name,
            'SN' => $record->serial_number
        ];
    }
    public static function getGlobalSearchResultActions(Model $record): array
    {
        return [
            Action::make('edit')
                ->url(static::getUrl('edit', ['record' => $record]), shouldOpenInNewTab: true),
            // Action::make('view')
            //     ->url(static::getUrl('view', ['record' => $record])),
        ];
    }
    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return $record->name;
    }
    public static function getNavigationLabel(): string
    {
        return trans('itsm::itsm.resource.device.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('itsm::itsm.resource.device.label');
    }

    public static function getLabel(): string
    {
        return trans('itsm::itsm.resource.device.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('itsm::itsm.resource.device.group');
    }

    public function getTitle(): string
    {
        return trans('itsm::itsm.resource.device.title.resource');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => DeviceResource\Pages\ListDevices::route('/'),
            'create' => DeviceResource\Pages\CreateDevice::route('/create'),
            'view' => DeviceResource\Pages\ViewDevice::route('/{record}'),
            'edit' => DeviceResource\Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
