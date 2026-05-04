<?php

namespace App\Filament\Resources\Genres\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class GenresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Genre')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make()
                    ->label('Hapus Genre')
                    ->modalHeading('Hapus Genre Yang Dipilih')
                    ->modalDescription('Apakah anda yakin ingin menghapus genre yang dipilih? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal')
                    ->successNotificationTitle('Genre Yang Dipilih Berhasil Dihapus'),
            ]);
    }
}
