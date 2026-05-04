<?php

namespace App\Filament\Resources\Animes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class AnimesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('Cover'),
                
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tipe Anime')
                    ->badge()
                    ->color('success'),
                    
                TextColumn::make('genres.name')
                    ->label('Genre')
                    ->badge(),
                    
                TextColumn::make('studios.name')
                    ->label('Studio')
                    ->badge(),
                    
                TextColumn::make('release_year')
                    ->label('Tahun')
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Ongoing' => 'primary',
                        'Upcoming' => 'warning',
                        'Hiatus' => 'danger',
                    }),
                    
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                    
                IconColumn::make('is_recommended')
                    ->label('Direkomendasikan')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make()
                    ->label('Hapus Anime')
                    ->modalHeading('Hapus Anime Yang Dipilih')
                    ->modalDescription('Apakah anda yakin ingin menghapus anime yang dipilih? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal')
                    ->successNotificationTitle('Anime Yang Dipilih Berhasil Dihapus'),
            ]);
    }
}
