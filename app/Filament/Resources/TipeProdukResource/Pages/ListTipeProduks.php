<?php

namespace App\Filament\Resources\TipeProdukResource\Pages;

use App\Filament\Resources\TipeProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipeProduks extends ListRecords
{
    protected static string $resource = TipeProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
