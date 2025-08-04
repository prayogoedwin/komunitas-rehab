<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Member;
use App\Models\Produk;
use App\Models\ProdukStokVarian;
use Filament\Forms\Components\{Select, TextInput, Textarea, Hidden, FileUpload };
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //setting letak grup menu
    protected static ?string $navigationGroup = 'Katalog';
    protected static ?int $navigationSort = 1; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Order';
    protected static ?string $pluralModelLabel = 'Order';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            
            Select::make('member_id')
                ->label('Member')
                ->relationship('member', 'name') // Sesuaikan dengan nama kolom yang ingin ditampilkan
                ->searchable()
                ->required()
                ->visible(fn (string $context) => $context === 'create'),

            TextInput::make('member_id')
                ->label('Member')
                ->disabled()
                ->dehydrated(false)
                ->visible(fn (string $context) => $context === 'edit')
                ->formatStateUsing(function ($state) {
                    return optional(\App\Models\Member::find($state))->name ?? '-';
                }),

            Select::make('produk_id')
                ->label('Produk')
                ->options(Produk::all()->pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->reactive()
                ->visible(fn (string $context) => $context === 'create'),

            TextInput::make('produk_id')
                ->label('Produk')
                ->disabled()
                ->dehydrated(false)
                ->visible(fn (string $context) => $context === 'edit')
                ->formatStateUsing(function ($state) {
                    return optional(Produk::find($state))->nama;
                }),

            Select::make('produk_stok_varians_id')
                ->label('Produk Varian')
                ->options(function (callable $get) {
                    $produkId = $get('produk_id');
                    if (!$produkId) return [];

                    return ProdukStokVarian::where('produk_id', $produkId)
                        ->get()
                        ->mapWithKeys(fn ($varian) => [
                            $varian->id => $varian->varian . ' (Stok: ' . $varian->stok . ')',
                        ])
                        ->toArray();
                })
                ->disableOptionWhen(function ($value) {
                    $varian = ProdukStokVarian::find($value);
                    return $varian && $varian->stok <= 0;
                })
                ->searchable()
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set) {
                    $varian = ProdukStokVarian::find($state);
                    if ($varian) {
                        $set('varian', $varian->varian);
                        $set('ukuran', $varian->ukuran);
                    }
                })
                ->visible(fn (string $context) => $context === 'create'),

            TextInput::make('produk_stok_varians_id')
                ->label('Produk Varian')
                ->disabled()
                ->dehydrated(false)
                ->visible(fn (string $context) => $context === 'edit')
                ->formatStateUsing(function ($state) {
                    $varian = ProdukStokVarian::find($state);
                    return $varian ? $varian->varian . ' (Stok: ' . $varian->stok . ')' : '-';
                }),

            TextInput::make('varian')
                ->label('Varian')
                ->disabled(),

            TextInput::make('ukuran')
                ->label('Ukuran')
                ->disabled(),

            TextInput::make('jumlah')
                ->numeric()
                ->required()
                ->disabled(),

            TextInput::make('poin_satuan')
                ->label('Poin/Satuan')
                ->numeric()
                ->required()
                ->disabled(),

            TextInput::make('poin_total')
                ->label('Total Poin')
                ->numeric()
                ->required()
                ->disabled(),

            Textarea::make('alamat_pengiriman')
                ->label('Alamat Pengiriman')
                ->disabled(),

            Select::make('status_order')
                ->options([
                    0 => 'Menunggu',
                    1 => 'Diproses',
                    2 => 'Selesai',
                    3 => 'Ditolak',
                ]),
              

            Select::make('status_kirim')
                ->options([
                    0 => 'Belum Dikirim',
                    1 => 'Sudah Dikirim',
                ]),
              

            TextInput::make('resi')
                ->label('No. Resi'),

            FileUpload::make('foto')
                    ->label('Foto Produk Saat Dikirim')
                    ->disk('public') // PASTIKAN INI ADA
                    ->image()
                    ->directory('order-fotos') // Folder penyimpanan
                    ->preserveFilenames(false) // <-- Biar nama file diacak (hash)
                    ->maxSize(2048) // 2MB
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->columnSpanFull()
                    ->required(fn (string $context): bool => $context === 'create'), // Hanya required saat create
                    
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->query(
            Order::query()
                ->orderByRaw('status_order = 0 DESC') // status_order 0 paling atas
                ->orderByRaw('status_kirim = 0 DESC') // status_kirim 0 di atas lainnya
                ->orderBy('created_at', 'asc')        // dari yang paling lama
        )
        ->columns([
            TextColumn::make('member.name')
                ->label('Member')
                ->searchable()
                ->sortable(),

            TextColumn::make('produkStokVarian.varian')
                ->label('Varian')
                ->searchable()
                ->sortable(),

            TextColumn::make('produk.nama')
                ->label('Produk')
                ->searchable()
                ->sortable(),

            TextColumn::make('ukuran')
                ->label('Ukuran')
                ->sortable(),

            TextColumn::make('jumlah')
                ->label('Jumlah')
                ->sortable(),

            TextColumn::make('poin_satuan')
                ->label('Poin/Satuan')
                ->sortable(),

            TextColumn::make('poin_total')
                ->label('Total Poin')
                ->sortable(),

            TextColumn::make('status_order')
                ->label('Status Order')
                ->badge()
                ->color(fn (string $state): string => match ((int) $state) {
                    0 => 'gray',
                    1 => 'warning',
                    2 => 'success',
                    3 => 'danger',
                    default => 'secondary',
                })
                ->formatStateUsing(fn (int $state): string => match ($state) {
                    0 => 'Menunggu',
                    1 => 'Diproses',
                    2 => 'Selesai',
                    3 => 'Ditolak',
                    default => 'Tidak Diketahui',
                }),

            TextColumn::make('status_kirim')
                ->label('Status Kirim')
                ->badge()
                ->color(fn (string $state): string => match ((int) $state) {
                    0 => 'gray',
                    1 => 'success',
                    default => 'secondary',
                })
                ->formatStateUsing(fn (int $state): string => match ($state) {
                    0 => 'Belum Dikirim',
                    1 => 'Sudah Dikirim',
                    default => 'Tidak Diketahui',
                }),

            TextColumn::make('resi')
                ->label('No. Resi')
                ->toggleable(),


            TextColumn::make('created_at')
                ->label('Dibuat')
                ->since()
                ->sortable(),

            TextColumn::make('updated_at')
                ->label('Diperbarui')
                ->since()
                ->sortable(),
        ])
        ->filters([
            SelectFilter::make('produk_id')
                ->label('Filter Produk')
                ->options(Produk::all()->pluck('nama', 'id')),

            SelectFilter::make('status_order')
                ->label('Status Order')
                ->options([
                    0 => 'Menunggu',
                    1 => 'Diproses',
                    2 => 'Selesai',
                    3 => 'Ditolak',
                ]),

            SelectFilter::make('status_kirim')
                ->label('Status Kirim')
                ->options([
                    0 => 'Belum Dikirim',
                    1 => 'Sudah Dikirim',
                ]),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
