<?php

namespace App\Filament\Resources\ProyekResource\Pages;

use App\Filament\Resources\ProyekResource;
use App\Models\Proyek;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateProyek extends CreateRecord
{
    protected static string $resource = ProyekResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::user()->id;
        return $data;
    }

    protected function handleRecordCreation(array $data): Proyek
    {
        return static::getModel()::create($data);
    }
}
