<?php

namespace App\Filament\Resources\Animes\Pages;

use App\Filament\Resources\Animes\AnimeResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateAnime extends CreateRecord
{
    protected static string $resource = AnimeResource::class;

    public ?string $heading = 'Tambah Anime';

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Tambahkan');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Tambahkan lalu Tambahkan lainnya');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Anime Berhasil Ditambahkan';
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
