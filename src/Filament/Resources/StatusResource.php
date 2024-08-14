<?php

namespace Xbigdaddyx\Itsm\Filament\Resources;

use App\Filament\AssetManagement\Resources\StatusResource\Pages;
use App\Filament\AssetManagement\Resources\StatusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusResource extends Resource
{
    protected static ?string $model = \Xbigdaddyx\Itsm\Models\Status::class;
    protected static bool $isScopedToTenant = false;
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Description' => $record->description,
        ];
    }
    // public static function getGlobalSearchResultActions(Model $record): array
    // {
    //     return [
    //         Action::make('edit')
    //             ->url(static::getUrl('edit', ['record' => $record]), shouldOpenInNewTab: true),
    //         // Action::make('view')
    //         //     ->url(static::getUrl('view', ['record' => $record])),
    //     ];
    // }
    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return $record->name;
    }
    public static function getNavigationLabel(): string
    {
        return trans('itsm::itsm.resource.status.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('itsm::itsm.resource.status.label');
    }

    public static function getLabel(): string
    {
        return trans('itsm::itsm.resource.status.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('itsm::itsm.resource.status.group');
    }

    public function getTitle(): string
    {
        return trans('itsm::itsm.resource.status.title.resource');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => StatusResource\Pages\ManageStatuses::route('/'),
        ];
    }
}
