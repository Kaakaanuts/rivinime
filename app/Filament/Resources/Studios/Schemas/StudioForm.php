<?php

namespace App\Filament\Resources\Studios\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class StudioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Studio')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
