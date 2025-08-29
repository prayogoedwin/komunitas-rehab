<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> b3a9fbf81fd788b1b01e6bbac97f30275fa6b463
use Illuminate\Support\Facades\Auth;

class EditComment extends EditRecord
{
    protected static string $resource = CommentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
<<<<<<< HEAD
        // $data['updated_by'] = Auth::user()->id;
        // $data['is_admin_comment'] = 1;
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super_admin')) {
            $data['user_id'] = Auth::user()->id;
        }
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super_admin')) {
            $data['user_id'] = Auth::user()->id;
        }
        $record->update($data);
        return $record;
    }

=======
        $data['updated_by'] = Auth::user()->id;
        return $data;
    }

>>>>>>> b3a9fbf81fd788b1b01e6bbac97f30275fa6b463
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
