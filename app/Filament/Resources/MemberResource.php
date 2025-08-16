<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
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
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\IconColumn;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //setting letak grup menu
    protected static ?string $navigationGroup = 'Pengguna';
    protected static ?int $navigationSort = 4; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Member';
    protected static ?string $pluralModelLabel = 'Member';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('name')->required(),
                 TextInput::make('email')
                    ->required()
                    ->email() // Validasi format email
                    ->unique(
                        table: 'members', // Ganti dengan nama tabel yang benar
                        column: 'email',
                        ignoreRecord: true // Mengabaikan record saat ini saat edit
                    ),
                 TextInput::make('password')
                    ->required()
                    ->password() // Ubah menjadi input type password
                    ->revealable() // Tambahkan tombol lihat/sembunyikan
                    ->minLength(8) // Validasi panjang minimum
                    ->confirmed() // Untuk fitur konfirmasi password
                    ->rules(['nullable']) // Tidak wajib diisi saat edit
                    ->dehydrated(fn ($state) => filled($state)) // Hindari hash jika kosong
                    ->autocomplete('new-password') // Hindari autofill browser
                    ->prefixIcon('heroicon-o-lock-closed'), // Tambahkan ikon
                // Field konfirmasi password (opsional tapi disarankan)
                TextInput::make('password_confirmation')
                    ->requiredWith('password')
                    ->password()
                    ->revealable()
                    ->label('Confirm Password')
                    ->dehydrated(false), // Jangan simpan ke database
                TextInput::make('whatsapp')
                    ->label('No Whatsapp')
                    ->default(0),
                TextInput::make('poin')
                    ->label('Poin Member')
                    ->readOnly() // Alternatif: non-editable tapi dengan style berbeda
                    ->default(0)
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000000),
                Toggle::make('status')
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Member')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('whatsapp')
                    ->label('Whatsapp')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('poin_terkini')
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

            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
