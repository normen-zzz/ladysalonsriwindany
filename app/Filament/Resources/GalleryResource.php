<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|\UnitEnum|null $navigationGroup = 'Manage Content';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\FileUpload::make('image')->label('Image')->image()->disk('s3')->visibility('public')->directory('gallery')->required()->columnSpanFull(),
            Forms\Components\TextInput::make('caption_id')->label('Caption (ID)'),
            Forms\Components\TextInput::make('caption_en')->label('Caption (EN)'),
            Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            Forms\Components\TextInput::make('sort_order')->label('Order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')->disk('s3')->size(80),
            Tables\Columns\TextColumn::make('caption_id')->label('Caption (ID)'),
            Tables\Columns\TextColumn::make('caption_en')->label('Caption (EN)'),
            Tables\Columns\ToggleColumn::make('is_active'),
        ])->defaultSort('sort_order')->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
