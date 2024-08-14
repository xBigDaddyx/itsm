<?php

namespace Xbigdaddyx\Itsm\Filament\Resources;

use App\Filament\AssetManagement\Resources\AssetResource\Pages;
use App\Filament\AssetManagement\Resources\AssetResource\RelationManagers;
use App\Models\Asset;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetResource extends Resource
{
    protected static ?string $model = \Xbigdaddyx\Itsm\Models\Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static function getGloballySearchableAttributes(): array
    {
        return ['code', 'account', 'capex_code'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category->name,
            'Device' => $record->device->name,
            'Brand' => $record->device->brand->name,
            'Type' => $record->device->type,
            'Account' => $record->account,
            'Capex' => $record->capex_code,
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
        return $record->device->name;
    }
    public static function getNavigationLabel(): string
    {
        return trans('itsm::itsm.resource.asset.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('itsm::itsm.resource.asset.label');
    }

    public static function getLabel(): string
    {
        return trans('itsm::itsm.resource.asset.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('itsm::itsm.resource.asset.group');
    }

    public function getTitle(): string
    {
        return trans('itsm::itsm.resource.asset.title.resource');
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
            'index' => AssetResource\Pages\ListAssets::route('/'),
            'create' => AssetResource\Pages\CreateAsset::route('/create'),
            'view' => AssetResource\Pages\ViewAsset::route('/{record}'),
            'edit' => AssetResource\Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
