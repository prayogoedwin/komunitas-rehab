<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Activitylog\Models\Activity;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     //setting letak grup menu
    protected static ?string $navigationGroup = 'Sistem';
    protected static ?int $navigationSort = 1; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Log Admin';
    protected static ?string $pluralModelLabel = 'Log Admin';

     public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view activity_log');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view activity_log');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view activity_log');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create activity_log');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit activity_log');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete activity_log');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete activity_log');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('log_name')
                    ->label('Log Name')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'default' => 'gray',
                        'auth' => 'success',
                        'user' => 'info',
                        'admin' => 'warning',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('event')
                    ->label('Event')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'created' => 'success',
                        'updated' => 'warning',
                        'deleted' => 'danger',
                        'login' => 'info',
                        'logout' => 'gray',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('subject_type')
                    ->label('Subject Type')
                    ->formatStateUsing(fn ($state) => class_basename($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('subject_id')
                    ->label('Subject ID')
                    ->sortable(),

                // Menampilkan email user yang terkait dengan log
                Tables\Columns\TextColumn::make('causer.email')
                    ->label('User Email')
                    ->sortable()
                    ->searchable()
                    ->default('System')
                    ->icon('heroicon-m-user')
                    ->iconColor('primary'),

                Tables\Columns\TextColumn::make('causer_type')
                    ->label('Causer Type')
                    ->formatStateUsing(fn ($state) => $state ? class_basename($state) : 'System')
                    ->sortable(),

                Tables\Columns\TextColumn::make('batch_uuid')
                    ->label('Batch')
                    ->limit(8)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        return $column->getState();
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->since()
                    ->tooltip(fn ($state) => $state->format('Y-m-d H:i:s')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Log Detail')
                    ->modalContent(function ($record) {
                        $properties = $record->properties?->toArray() ?? [];

                        // bikin HTML table dari array
                        $html = '<div class="space-y-2">';
                        foreach ($properties as $key => $value) {
                            $html .= '<div class="border-b pb-2">';
                            $html .= "<strong class='text-sm text-gray-700 uppercase'>{$key}</strong>";

                            if (is_array($value)) {
                                $html .= '<pre class="text-xs bg-gray-100 p-2 rounded mt-1 overflow-x-auto" style="background-color:#000">' 
                                    . json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) 
                                    . '</pre>';
                            } else {
                                $html .= '<div class="text-sm text-gray-800">' . e($value) . '</div>';
                            }

                            $html .= '</div>';
                        }
                        $html .= '</div>';

                        return new \Illuminate\Support\HtmlString($html);
                    })
                    ->modalWidth('2xl'),
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([
                //Tables\Actions\DeleteBulkAction::make(),
                //]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            // 'create' => Pages\CreateActivity::route('/create'),
            // 'view' => Pages\ViewActivity::route('/{record}'),
            // 'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
