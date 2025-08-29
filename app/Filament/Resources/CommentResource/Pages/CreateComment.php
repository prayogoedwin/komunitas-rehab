<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
<<<<<<< HEAD
=======
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::user()->id;
        $data['user_id'] = Auth::user()->id;
        $data['is_admin_comment'] = 1;
        return $data;
    }
>>>>>>> b3a9fbf81fd788b1b01e6bbac97f30275fa6b463
}
