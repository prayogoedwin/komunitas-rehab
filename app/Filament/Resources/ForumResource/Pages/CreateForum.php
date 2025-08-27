<?php

namespace App\Filament\Resources\ForumResource\Pages;

use App\Filament\Resources\ForumResource;
use App\Models\Forum;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateForum extends CreateRecord
{
    protected static string $resource = ForumResource::class;

    protected function handleRecordCreation(array $data): Forum
    {
        return Forum::firstOrCreate([
            'judul' => $data['judul'],
            // 'slug' => $data['slug'],
            'kategori_id' => $data['kategori_id'],
            'deskripsi' => $data['deskripsi'],
            'sender_id' => Auth::user()->id
        ]);
    }
}
