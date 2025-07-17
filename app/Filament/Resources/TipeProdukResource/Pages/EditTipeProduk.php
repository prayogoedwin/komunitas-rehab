<?php

namespace App\Filament\Resources\TipeProdukResource\Pages;

use App\Filament\Resources\TipeProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipeProduk extends EditRecord
{
    protected static string $resource = TipeProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
