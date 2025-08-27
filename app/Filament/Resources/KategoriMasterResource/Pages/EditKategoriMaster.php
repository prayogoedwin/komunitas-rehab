<?php

namespace App\Filament\Resources\KategoriMasterResource\Pages;

use App\Filament\Resources\KategoriMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriMaster extends EditRecord
{
    protected static string $resource = KategoriMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
