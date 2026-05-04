<?php

namespace App\Filament\Resources\Studios\Pages;

use App\Filament\Resources\Studios\StudioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditStudio extends EditRecord
{
    protected static string $resource = StudioResource::class;

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Studio Berhasil Diperbarui';
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus Studio')
                ->modalHeading('Hapus Studio')
                ->modalDescription('Apakah anda yakin ingin menghapus studio ini? Tindakan ini tidak dapat dibatalkan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->modalCancelActionLabel('Batal')
                ->successNotificationTitle('Studio Berhasil Dihapus'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
