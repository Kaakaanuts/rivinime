<?php

namespace App\Filament\Resources\Animes\Pages;

use App\Filament\Resources\Animes\AnimeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnimes extends ListRecords
{
    protected static string $resource = AnimeResource::class;

    public ?string $heading = 'Daftar Anime';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Anime'),
        ];
    }
}
