<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComments extends ListRecords
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            // Actions\CreateAction::make(),
=======
            Actions\CreateAction::make(),
>>>>>>> b3a9fbf81fd788b1b01e6bbac97f30275fa6b463
        ];
    }
}
