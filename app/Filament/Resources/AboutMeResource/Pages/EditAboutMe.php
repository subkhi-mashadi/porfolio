<?php

namespace App\Filament\Resources\AboutMeResource\Pages;

use App\Filament\Resources\AboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutMe extends EditRecord
{
    protected static string $resource = AboutMeResource::class;
    protected static ?string $title = 'Edit Biodata Diri';

    protected function getHeaderActions(): array
    {
        return [
            // Kita tidak perlu tombol delete karena ini adalah data tunggal
            // Actions\DeleteAction::make(), 
        ];
    }
    
    // Redirect setelah update, arahkan kembali ke halaman edit yang sama
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()->id]);
    }
    
    // Pemberitahuan sukses setelah menyimpan
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Biodata Diri berhasil diperbarui!';
    }
}