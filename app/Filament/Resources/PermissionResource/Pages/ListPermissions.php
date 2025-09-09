<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Permission')
                ->using(function (array $data) {
                    $name = strtolower(trim($data['name']));
                    $guard = $data['guard_name'] ?? 'web';
                    $actions = ['view', 'create', 'edit', 'delete'];

                    $lastCreated = null;

                    foreach ($actions as $action) {
                        $lastCreated = \Spatie\Permission\Models\Permission::firstOrCreate([
                            'name' => "{$action} {$name}",
                            'guard_name' => $guard,
                        ]);
                    }

                    return $lastCreated; // Filament anggap ini record yang baru dibuat
                }),
        ];
    }
}
