<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms\Components\CheckboxList;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     //setting letak grup menu
    protected static ?string $navigationGroup = 'Pengguna';
    protected static ?int $navigationSort = 1; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Role Admin';
    protected static ?string $pluralModelLabel = 'Role Admin';

      public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view roles');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view roles');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view roles');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create roles');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit roles');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete roles');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete roles');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Role Name')
                    ->required(),

                Forms\Components\TextInput::make('guard_name')
                    ->default('web')
                    ->required(),


                Forms\Components\Fieldset::make('Permissions for this Role')
                    ->schema(
                        self::getPermissionGroups()
                    )
            ]);
    }

    public static function getPermissionGroups(): array
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return ucfirst(explode(' ', $permission->name)[1] ?? $permission->name);
        });

        $groups = [];

        foreach ($permissions as $module => $perms) {
            $groups[] = CheckboxList::make("permissions_{$module}")
                ->label($module)
                ->options($perms->pluck('name', 'id'))
                ->columns(2)
                ->bulkToggleable();
        }

        return $groups;
    }

    

    

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('guard_name'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }


    
}
