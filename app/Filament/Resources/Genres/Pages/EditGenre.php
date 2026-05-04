<?php

namespace App\Filament\Resources\Genres\Pages;

use App\Filament\Resources\Genres\GenreResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditGenre extends EditRecord
{
    protected static string $resource = GenreResource::class;

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Genre Berhasil Diperbarui';
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
                ->label('Hapus Genre')
                ->modalHeading('Hapus Genre')
                ->modalDescription('Apakah anda yakin ingin menghapus genre ini? Tindakan ini tidak dapat dibatalkan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->modalCancelActionLabel('Batal')
                ->successNotificationTitle('Genre Berhasil Dihapus'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
