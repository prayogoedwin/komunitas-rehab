<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EditComment extends EditRecord
{
    protected static string $resource = CommentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
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
            $data['updated_by'] = Auth::user()->id;
        }
        $record->update($data);
        return $record;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
