<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('key')->required()->unique(ignoreRecord: true),
            Forms\Components\Textarea::make('value')->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('key')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('value')->limit(100)->wrap(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
