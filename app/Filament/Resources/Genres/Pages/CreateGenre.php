<?php

namespace App\Filament\Resources\Genres\Pages;

use App\Filament\Resources\Genres\GenreResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateGenre extends CreateRecord
{
    protected static string $resource = GenreResource::class;

    public ?string $heading = 'Tambah Genre';

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
        return 'Genre Berhasil Ditambahkan';
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
