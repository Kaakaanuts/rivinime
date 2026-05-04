<?php

namespace App\Filament\Resources\Animes\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

class AnimeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Anime')
                    ->required()
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        $set('slug', Str::slug($state));
                    })
                    ->live(onBlur: true)
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('release_year')
                    ->label('Tahun Rilis')
                    ->numeric()
                    ->required()
                    ->length(4),

                Select::make('type')
                    ->label('Tipe Anime')
                    ->required()
                    ->options([
                        'TV' => 'TV',
                        'Movie' => 'Movie',
                        'OVA' => 'OVA',
                        'ONA' => 'ONA',
                    ]),

                Select::make('status')
                    ->required()
                    ->options([
                        'Completed' => 'Completed',
                        'Hiatus' => 'Hiatus',
                        'Ongoing' => 'Ongoing',
                        'Upcoming' => 'Upcoming',
                    ]),
                
                // Relasi ke Genre (banyak ke banyak)
                Select::make('genres')
                    ->label('Genre')
                    ->relationship('genres', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),
                    
                // Relasi ke Studio 
                Select::make('studios')
                    ->label('Studio')
                    ->relationship('studios', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),
                    
                TextInput::make('rating')
                    ->numeric()
                    ->inputMode('decimal')
                    ->minValue(0)
                    ->maxValue(10)
                    ->required(),

                // URL / Upload foto anime
                FileUpload::make('cover_image')
                    ->image()
                    ->directory('animes/covers')
                    ->required(),

                Toggle::make('is_recommended')
                    ->label('Direkomendasikan')
                    ->default(false)
                    ->columnSpanFull(),
                    
                // Deskripsi review
                RichEditor::make('review')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
