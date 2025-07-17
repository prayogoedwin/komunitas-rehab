<?php

namespace App\Filament\Resources\ProdukStokVarianResource\Pages;

use App\Filament\Resources\ProdukStokVarianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdukStokVarian extends EditRecord
{
    protected static string $resource = ProdukStokVarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
