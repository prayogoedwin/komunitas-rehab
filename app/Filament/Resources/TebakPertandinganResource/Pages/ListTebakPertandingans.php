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
            // Actions\CreateAction::make(),
             Actions\CreateAction::make()
                ->url(fn () => TebakPertandinganResource::getUrl('create', [
                    'pertandingan_id' => request()->input('tableFilters.pertandingan_id.value'),
                ])),
        ];
    }
}
