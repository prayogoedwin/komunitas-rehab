<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipeProdukResource\Pages;
use App\Filament\Resources\TipeProdukResource\RelationManagers;
use App\Models\TipeProduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;


class TipeProdukResource extends Resource
{
    protected static ?string $model = TipeProduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        //setting letak grup menu
    protected static ?string $navigationGroup = 'Katalog';
    protected static ?int $navigationSort = 4; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Tipe Produk';
    protected static ?string $pluralModelLabel = 'Tipe Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('nama')->required(),
                TextInput::make('deskripsi')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('nama')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
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
            'index' => Pages\ListTipeProduks::route('/'),
            'create' => Pages\CreateTipeProduk::route('/create'),
            'edit' => Pages\EditTipeProduk::route('/{record}/edit'),
        ];
    }
}
