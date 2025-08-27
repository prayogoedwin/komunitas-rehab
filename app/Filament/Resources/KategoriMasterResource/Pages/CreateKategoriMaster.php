<?php

namespace App\Filament\Resources\KategoriMasterResource\Pages;

use App\Filament\Resources\KategoriMasterResource;
use App\Models\KategoriMaster;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateKategoriMaster extends CreateRecord
{
    protected static string $resource = KategoriMasterResource::class;

    protected function handleRecordCreation(array $data): KategoriMaster
    {

        return KategoriMaster::firstOrCreate([
            'nama_kategori' => strtolower($data['nama_kategori']),
            'jenis_kategori' => strtolower($data['jenis_kategori']),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);
    }
}
