<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string|\UnitEnum|null $navigationGroup = 'Manage Content';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\FileUpload::make('photo')->label('Photo')->image()->disk('s3')->visibility('public')->directory('testimonials')->avatar(),
            Forms\Components\Select::make('rating')->options([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5])->default(5),
            Forms\Components\Tabs::make('Reviews')->tabs([
                Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                    Forms\Components\Textarea::make('review_id')->label('Review (ID)')->required()->rows(4),
                ]),
                Forms\Components\Tabs\Tab::make('English')->schema([
                    Forms\Components\Textarea::make('review_en')->label('Review (EN)')->rows(4),
                ]),
            ])->columnSpanFull(),
            Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('photo')->disk('s3')->circular()->size(50),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('review_id')->label('Review (ID)')->limit(80),
            Tables\Columns\TextColumn::make('rating')->badge(),
            Tables\Columns\ToggleColumn::make('is_active'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
