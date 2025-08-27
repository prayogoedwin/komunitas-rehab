<?php

namespace App\Filament\Resources\KategoriMasterResource\Pages;

use App\Filament\Resources\KategoriMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriMasters extends ListRecords
{
    protected static string $resource = KategoriMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
