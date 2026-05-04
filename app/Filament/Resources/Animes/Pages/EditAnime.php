<?php

namespace App\Filament\Resources\Animes\Pages;

use App\Filament\Resources\Animes\AnimeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditAnime extends EditRecord
{
    protected static string $resource = AnimeResource::class;

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Anime Berhasil Diperbarui';
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
                ->label('Hapus Anime')
                ->modalHeading('Hapus Anime')
                ->modalDescription('Apakah anda yakin ingin menghapus anime ini? Tindakan ini tidak dapat dibatalkan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->modalCancelActionLabel('Batal')
                ->successNotificationTitle('Anime Berhasil Dihapus'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
