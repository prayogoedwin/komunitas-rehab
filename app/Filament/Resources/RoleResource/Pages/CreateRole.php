<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $permissions = $data['permissions'] ?? [];
        unset($data['permissions']);

        $role = Role::create($data);
        $role->syncPermissions($permissions);

        return $data;
    }
}
