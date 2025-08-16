<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiResource\Pages;
use App\Filament\Resources\InformasiResource\RelationManagers;
use App\Models\Informasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;


class InformasiResource extends Resource
{
    protected static ?string $model = Informasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    //setting letak grup menu
    protected static ?string $navigationGroup = 'Web Setting';
    protected static ?int $navigationSort = 3; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Informasi';
    protected static ?string $pluralModelLabel = 'Informasi';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view informasis');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view informasis');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view informasis');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create informasis');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit informasis');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete informasis');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete informasis');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('slug')->required(),
                 TextInput::make('nama')->required(),
                 RichEditor::make('description')->required()->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Informasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListInformasis::route('/'),
            'create' => Pages\CreateInformasi::route('/create'),
            'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }
}
