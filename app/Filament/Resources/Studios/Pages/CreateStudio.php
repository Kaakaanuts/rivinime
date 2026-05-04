<?php

namespace App\Filament\Resources\Studios\Pages;

use App\Filament\Resources\Studios\StudioResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateStudio extends CreateRecord
{
    protected static string $resource = StudioResource::class;

    public ?string $heading = 'Tambah Studio';

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
        return 'Studio Berhasil Ditambahkan';
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
