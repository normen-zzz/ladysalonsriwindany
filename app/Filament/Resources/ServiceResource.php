<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';
    protected static string|\UnitEnum|null $navigationGroup = 'Manage Content';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Tabs::make('Translations')->tabs([
                Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                    Forms\Components\TextInput::make('title_id')->label('Title (ID)')->required(),
                    Forms\Components\Textarea::make('description_id')->label('Description (ID)')->rows(4),
                ]),
                Forms\Components\Tabs\Tab::make('English')->schema([
                    Forms\Components\TextInput::make('title_en')->label('Title (EN)'),
                    Forms\Components\Textarea::make('description_en')->label('Description (EN)')->rows(4),
                ]),
            ])->columnSpanFull(),
            Forms\Components\TextInput::make('price')->label('Price (Rp)')->numeric()->prefix('Rp'),
            Forms\Components\FileUpload::make('image')->label('Image')->image()->disk('s3')->visibility('public')->directory('services'),
            Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            Forms\Components\TextInput::make('sort_order')->label('Order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')->disk('s3')->circular(false)->size(60),
            Tables\Columns\TextColumn::make('title_id')->label('Title (ID)')->searchable(),
            Tables\Columns\TextColumn::make('title_en')->label('Title (EN)')->searchable(),
            Tables\Columns\TextColumn::make('price')->label('Price')->money('IDR')->sortable(),
            Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
        ])->defaultSort('sort_order')->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
