<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriMasterResource\Pages;
use App\Filament\Resources\KategoriMasterResource\RelationManagers;
use App\Models\KategoriMaster;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriMasterResource extends Resource
{
    protected static ?string $model = KategoriMaster::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Web Setting';
    protected static ?int $navigationSort = 6;

    // Label
    protected static ?string $modelLabel = 'Kategori Halaman';
    protected static ?string $pluralModelLabel = 'Kategori Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kategori')->required(),
                TextInput::make('jenis_kategori')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->formatStateUsing(fn($state) => ucwords($state)),
                Tables\Columns\TextColumn::make('jenis_kategori')
                    ->formatStateUsing(fn($state) => ucwords($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKategoriMasters::route('/'),
            'create' => Pages\CreateKategoriMaster::route('/create'),
            'edit' => Pages\EditKategoriMaster::route('/{record}/edit'),
        ];
    }
}
