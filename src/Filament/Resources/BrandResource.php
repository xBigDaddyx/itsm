<?php

namespace Xbigdaddyx\Itsm\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Xbigdaddyx\Itsm\Models\Brand;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;
    protected static bool $isScopedToTenant = false;
    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'website'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Website' => $record->website,
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
        return trans('itsm::itsm.resource.brand.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('itsm::itsm.resource.brand.label');
    }

    public static function getLabel(): string
    {
        return trans('itsm::itsm.resource.brand.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('itsm::itsm.resource.brand.group');
    }

    public function getTitle(): string
    {
        return trans('itsm::itsm.resource.brand.title.resource');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pictures')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo')
                            ->directory('logo-brands')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend('brands-'),
                            )
                            ->downloadable()
                            ->image()
                            ->imageEditor(),
                    ]),
                Forms\Components\Section::make('General')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->url(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->rowIndex(),
                Tables\Columns\ImageColumn::make('logo'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->copyable()
                    ->copyableState(fn(string $state): string => "URL: {$state}"),
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
            'index' => BrandResource\Pages\ManageBrands::route('/'),
        ];
    }
}
