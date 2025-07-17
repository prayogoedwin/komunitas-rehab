<?php

namespace App\Filament\Resources\PertandinganResource\Pages;

use App\Filament\Resources\PertandinganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPertandingans extends ListRecords
{
    protected static string $resource = PertandinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
