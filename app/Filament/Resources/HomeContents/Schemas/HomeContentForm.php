<?php

namespace App\Filament\Resources\HomeContents\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class HomeContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Section::make('Hero Section')
                    ->columns(2)
                    ->schema([
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Hero Image')
                            ->image()
                            ->disk('s3')
                            ->visibility('public')
                            ->directory('home')
                            ->columnSpanFull(),
                        Forms\Components\Tabs::make('Hero Text')->tabs([
                            Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                                Forms\Components\TextInput::make('hero_title_id')->label('Title 1 (ID)'),
                                Forms\Components\TextInput::make('hero_title2_id')->label('Title 2 (ID)'),
                                Forms\Components\Textarea::make('hero_subtitle_id')->label('Subtitle (ID)')->rows(3),
                                Forms\Components\TextInput::make('hero_badge_title_id')->label('Badge Title (ID)'),
                                Forms\Components\TextInput::make('hero_badge_subtitle_id')->label('Badge Subtitle (ID)'),
                            ]),
                            Forms\Components\Tabs\Tab::make('English')->schema([
                                Forms\Components\TextInput::make('hero_title_en')->label('Title 1 (EN)'),
                                Forms\Components\TextInput::make('hero_title2_en')->label('Title 2 (EN)'),
                                Forms\Components\Textarea::make('hero_subtitle_en')->label('Subtitle (EN)')->rows(3),
                                Forms\Components\TextInput::make('hero_badge_title_en')->label('Badge Title (EN)'),
                                Forms\Components\TextInput::make('hero_badge_subtitle_en')->label('Badge Subtitle (EN)'),
                            ]),
                        ])->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Stats')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('stat1_value')->label('Stat 1 Value'),
                        Forms\Components\TextInput::make('stat2_value')->label('Stat 2 Value'),
                        Forms\Components\TextInput::make('stat3_value')->label('Stat 3 Value'),
                        Forms\Components\TextInput::make('stat1_label_id')->label('Stat 1 Label (ID)'),
                        Forms\Components\TextInput::make('stat2_label_id')->label('Stat 2 Label (ID)'),
                        Forms\Components\TextInput::make('stat3_label_id')->label('Stat 3 Label (ID)'),
                        Forms\Components\TextInput::make('stat1_label_en')->label('Stat 1 Label (EN)'),
                        Forms\Components\TextInput::make('stat2_label_en')->label('Stat 2 Label (EN)'),
                        Forms\Components\TextInput::make('stat3_label_en')->label('Stat 3 Label (EN)'),
                    ]),

                Forms\Components\Section::make('Services Section')
                    ->schema([
                        Forms\Components\Tabs::make('Services Text')->tabs([
                            Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                                Forms\Components\TextInput::make('services_title_id')->label('Title (ID)'),
                                Forms\Components\TextInput::make('services_subtitle_id')->label('Subtitle (ID)'),
                                Forms\Components\Textarea::make('services_description_id')->label('Description (ID)')->rows(3),
                                Forms\Components\Textarea::make('services_empty_message_id')->label('Empty Message (ID)')->rows(3),
                            ]),
                            Forms\Components\Tabs\Tab::make('English')->schema([
                                Forms\Components\TextInput::make('services_title_en')->label('Title (EN)'),
                                Forms\Components\TextInput::make('services_subtitle_en')->label('Subtitle (EN)'),
                                Forms\Components\Textarea::make('services_description_en')->label('Description (EN)')->rows(3),
                                Forms\Components\Textarea::make('services_empty_message_en')->label('Empty Message (EN)')->rows(3),
                            ]),
                        ])->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Testimonials Section')
                    ->schema([
                        Forms\Components\Tabs::make('Testimonials Text')->tabs([
                            Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                                Forms\Components\TextInput::make('testimonials_title_id')->label('Title (ID)'),
                                Forms\Components\TextInput::make('testimonials_subtitle_id')->label('Subtitle (ID)'),
                                Forms\Components\Textarea::make('testimonials_empty_message_id')->label('Empty Message (ID)')->rows(3),
                            ]),
                            Forms\Components\Tabs\Tab::make('English')->schema([
                                Forms\Components\TextInput::make('testimonials_title_en')->label('Title (EN)'),
                                Forms\Components\TextInput::make('testimonials_subtitle_en')->label('Subtitle (EN)'),
                                Forms\Components\Textarea::make('testimonials_empty_message_en')->label('Empty Message (EN)')->rows(3),
                            ]),
                        ])->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('CTA Section')
                    ->schema([
                        Forms\Components\Tabs::make('CTA Text')->tabs([
                            Forms\Components\Tabs\Tab::make('Indonesian')->schema([
                                Forms\Components\TextInput::make('cta_badge_id')->label('Badge (ID)'),
                                Forms\Components\TextInput::make('cta_title_id')->label('Title (ID)'),
                                Forms\Components\TextInput::make('cta_highlight_id')->label('Highlight (ID)'),
                                Forms\Components\Textarea::make('cta_subtitle_id')->label('Subtitle (ID)')->rows(3),
                                Forms\Components\TextInput::make('cta_button_text_id')->label('Button Text (ID)'),
                            ]),
                            Forms\Components\Tabs\Tab::make('English')->schema([
                                Forms\Components\TextInput::make('cta_badge_en')->label('Badge (EN)'),
                                Forms\Components\TextInput::make('cta_title_en')->label('Title (EN)'),
                                Forms\Components\TextInput::make('cta_highlight_en')->label('Highlight (EN)'),
                                Forms\Components\Textarea::make('cta_subtitle_en')->label('Subtitle (EN)')->rows(3),
                                Forms\Components\TextInput::make('cta_button_text_en')->label('Button Text (EN)'),
                            ]),
                        ])->columnSpanFull(),
                    ]),
            ]);
    }
}
