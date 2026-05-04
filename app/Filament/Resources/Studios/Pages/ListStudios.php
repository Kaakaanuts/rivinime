<?php

namespace App\Filament\Resources\Studios\Pages;

use App\Filament\Resources\Studios\StudioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudios extends ListRecords
{
    protected static string $resource = StudioResource::class;

    protected ?string $heading = 'Daftar Studio';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Studio'),
        ];
    }
}
