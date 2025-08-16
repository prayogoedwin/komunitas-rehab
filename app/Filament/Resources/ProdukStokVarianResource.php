<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukStokVarianResource\Pages;
use App\Filament\Resources\ProdukStokVarianResource\RelationManagers;
use App\Models\ProdukStokVarian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Components\SelectFilter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Http\Request;
use Filament\Tables\Actions;


class ProdukStokVarianResource extends Resource
{
    protected static ?string $model = ProdukStokVarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

      //setting letak grup menu
    protected static ?string $navigationGroup = 'Katalog';
    protected static ?int $navigationSort = 3; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Varian & Stok';
    protected static ?string $pluralModelLabel = 'Varian & Stok';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view produk_stok_varians');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view produk_stok_varians');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view produk_stok_varians');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create produk_stok_varians');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit produk_stok_varians');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete produk_stok_varians');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete produk_stok_varians');
    }


    public static function form(Form $form): Form
    {   
        
        return $form
            ->schema([
                Select::make('produk_id')
                    ->relationship('produk', 'nama')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->default(fn () => request()->input('produk_id')) // isi otomatis dari query
                    ->disabled(fn () => request()->has('produk_id')), // disable kalau dari URL
                TextInput::make('varian')
                    ->label('Varian (misal: S, M, L)')
                    ->maxLength(255),
                TextInput::make('ukuran')
                    ->label('Ukuran (misal: w:58 x h:70 cm)')
                    ->maxLength(255),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('varian')
                    ->label('Varian')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ukuran')
                    ->label('Ukuran')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('produk.nama')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable()
                    ->alignCenter(),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('produk_id')
                ->label('Produk')
                ->relationship('produk', 'nama')
                ->searchable()
                ->preload(),
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
            'index' => Pages\ListProdukStokVarians::route('/'),
            'create' => Pages\CreateProdukStokVarian::route('/create'),
            'edit' => Pages\EditProdukStokVarian::route('/{record}/edit'),
        ];
    }
}
