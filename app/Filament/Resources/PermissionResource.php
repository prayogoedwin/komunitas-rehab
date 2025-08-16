<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Permission;
use App\Filament\Resources\PermissionResource\Pages;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;
   
     protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     //setting letak grup menu
    protected static ?string $navigationGroup = 'Pengguna';
    protected static ?int $navigationSort = 2; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Permission Admin';
    protected static ?string $pluralModelLabel = 'Permission Admin';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view permissions');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view permissions');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view permissions');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create permissions');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit permissions');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete permissions');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete permissions');
    }


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Module Name (e.g., users)')
                    ->required(),

                Forms\Components\TextInput::make('guard_name')
                    ->default('web')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('guard_name')->label('Guard name'),

                // Kolom Menu
                Tables\Columns\TextColumn::make('menu')
                    ->label('Menu')
                    ->sortable()
                    ->getStateUsing(function ($record) {
                        // Ambil kata terakhir dari nama permission
                        return ucfirst(last(explode(' ', $record->name)));
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('menu')
                    ->label('Menu')
                    ->options(function () {
                        return Permission::all()
                            ->map(function ($perm) {
                                return ucfirst(last(explode(' ', $perm->name)));
                            })
                            ->unique()
                            ->sort()
                            ->mapWithKeys(fn($menu) => [$menu => $menu]);
                    })
                    ->query(function ($query, $data) {
                        if ($data['value']) {
                            $query->where('name', 'like', "%{$data['value']}");
                        }
                    })
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPermissions::route('/'),
            // 'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }
}
