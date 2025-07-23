<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use App\Models\ProdukStokVarian;
use App\Models\KateegoriProduk;
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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use App\Filament\Resources\ProdukStokVarianResource;


class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     //setting letak grup menu
    protected static ?string $navigationGroup = 'Katalog';
    protected static ?int $navigationSort = 3; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Produk';
    protected static ?string $pluralModelLabel = 'Produk';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),

                TextInput::make('poin')
                    ->label('Poin Produk')
                    ->required()
                    ->numeric()
                    ->type('number')
                    ->minValue(0)
                    ->maxValue(1000000)
                    ->step(1)
                    ->default(0),

                Select::make('kategori_produk')
                    ->label('Kategori Produk')
                    // ->options(KateegoriProduk::all()->pluck('nama', 'id'))
                    ->options(fn () => KateegoriProduk::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                
                Select::make('tipe_produk')
                    ->label('Tipe Produk')
                    ->options(fn () => TipeProduk::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                RichEditor::make('deskripsi')->required()->columnSpan('full'),
                Toggle::make('status')
                    ->label('Status'),

                FileUpload::make('foto')
                    ->label('Foto Produk')
                    ->disk('public') // PASTIKAN INI ADA
                    ->image()
                    ->directory('produk-fotos') // Folder penyimpanan
                    ->preserveFilenames(false) // <-- Biar nama file diacak (hash)
                    ->maxSize(2048) // 2MB
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->columnSpanFull()
                    ->required(fn (string $context): bool => $context === 'create') // Hanya required saat create
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('foto')
                ->label('Foto')
                ->disk('public')
                ->width(60)
                ->height(60)
                ->toggleable()
                ->defaultImageUrl(url('/img/logo.png')),
            
            TextColumn::make('nama')
                ->label('Nama Produk')
                ->searchable()
                ->sortable(),

            TextColumn::make('tipe.nama')
                ->label('Tipe Produk')
                ->sortable()
                ->searchable()
                ->badge()
                ->color('success')
                ->toggleable(),
            
            TextColumn::make('kategori.nama')
                ->label('Kategori')
                ->sortable()
                ->searchable()
                ->badge()
                ->color('info')
                ->toggleable(),
            
            TextColumn::make('poin')
                ->label('Poin')
                ->sortable()
                ->alignCenter()
                ->formatStateUsing(fn ($state) => number_format($state, 0) . ' poin')
                ->icon('heroicon-o-star')
                ->iconColor('warning'),
            
            IconColumn::make('status')
                ->label('Status')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->trueColor('success')
                ->falseIcon('heroicon-o-x-circle')
                ->falseColor('danger'),
            
            TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            
            TextColumn::make('updated_at')
                ->label('Diperbarui')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('stokVarian')
                ->label('Stok & Varian')
                ->icon('heroicon-o-archive-box')
                ->color('info')
                ->url(fn (Produk $record): string => ProdukStokVarianResource::getUrl('index', [
                    'tableFilters[produk_id][value]' => $record->id
                ])),
                
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
