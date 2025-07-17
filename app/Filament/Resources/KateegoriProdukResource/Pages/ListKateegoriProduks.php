<?php

namespace App\Filament\Resources\KateegoriProdukResource\Pages;

use App\Filament\Resources\KateegoriProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKateegoriProduks extends ListRecords
{
    protected static string $resource = KateegoriProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
