<?php

namespace App\Filament\Resources\EdukasiResource\Pages;

use App\Filament\Resources\EdukasiResource;
use App\Models\Edukasi;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateEdukasi extends CreateRecord
{
    protected static string $resource = EdukasiResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::user()->id;
        return $data;
    }

    protected function handleRecordCreation(array $data): Edukasi
    {
        return static::getModel()::create($data);
    }
}
