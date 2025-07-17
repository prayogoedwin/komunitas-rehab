<?php

namespace App\Filament\Resources\KateegoriProdukResource\Pages;

use App\Filament\Resources\KateegoriProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKateegoriProduk extends EditRecord
{
    protected static string $resource = KateegoriProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
