<?php

namespace App\Filament\Resources\TebakPertandinganResource\Pages;

use App\Filament\Resources\TebakPertandinganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTebakPertandingans extends ListRecords
{
    protected static string $resource = TebakPertandinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
