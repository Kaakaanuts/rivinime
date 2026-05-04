<?php

namespace App\Filament\Resources\Genres\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str; // <-- Tambahkan ini

class GenreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Genre')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }
}
