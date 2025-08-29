<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    protected function afterCreate(): void
    {
        $member = $this->record; // Data Member yang baru dibuat

        // Kirim email verifikasi
        Mail::raw('Terima kasih sudah mendaftar. Silakan verifikasi email Anda.', function ($message) use ($member) {
            $message->to($member->email)
                ->subject('Verifikasi Email');
        });
    }
}
