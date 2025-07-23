<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TebakPertandinganResource\Pages;
use App\Filament\Resources\TebakPertandinganResource\RelationManagers;
use App\Models\TebakPertandingan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;


class TebakPertandinganResource extends Resource
{
    protected static ?string $model = TebakPertandingan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //setting letak grup menu
    protected static ?string $navigationGroup = 'Pertandingan';
    protected static ?int $navigationSort = 3; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Tebakan Member';
    protected static ?string $pluralModelLabel = 'Tebakan Member';

   
    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Informasi Utama')
                ->columns(2)
                ->schema([
                    Select::make('member_id')
                        ->label('Member')
                        ->relationship('member', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                        
                    Select::make('pertandingan_id')
                        ->label('Pertandingan')
                        ->relationship('pertandingan', 'judul')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->default(fn () => request()->input('pertandingan_id')) // isi otomatis dari query
                        ->disabled(fn () => request()->has('pertandingan_id')), // disable kalau dari URL
                    
                ]),
                
            // Bagian lainnya tetap sama seperti sebelumnya...
            Section::make('Tebakan Pemenang')
                ->columns(3)
                ->schema([
                    TextInput::make('tebak_pemenang_id')
                        ->label('ID Pemenang')
                        ->numeric()
                        ->default(0),
                        
                    TextInput::make('tebak_pemenang')
                        ->label('Nama Pemenang')
                        ->maxLength(255),
                        
                    Toggle::make('status_tebak_pemenang')
                        ->label('Status Benar')
                        ->default(0),
                        
                    TextInput::make('poin_tebak_pemenang')
                        ->label('Poin')
                        ->numeric()
                        ->default(0),
                ]),
                
            Section::make('Tebakan Metode')
                ->columns(3)
                ->schema([
                    TextInput::make('tebak_metode')
                        ->label('Metode Kemenangan')
                        ->maxLength(255),
                        
                    Toggle::make('status_tebak_metode')
                        ->label('Status Benar')
                        ->default(0),
                        
                    TextInput::make('poin_tebak_metode')
                        ->label('Poin')
                        ->numeric()
                        ->default(0),
                ]),
                
            Section::make('Tebakan Ronde')
                ->columns(3)
                ->schema([
                    TextInput::make('tebak_ronde')
                        ->label('Prediksi Ronde')
                        ->maxLength(255),
                        
                    Toggle::make('status_tebak_ronde')
                        ->label('Status Benar')
                        ->default(0),
                        
                    TextInput::make('poin_tebak_ronde')
                        ->label('Poin')
                        ->numeric()
                        ->default(0),
                ]),
                
            Section::make('Poin & Status')
                ->columns(2)
                ->schema([
                    TextInput::make('poin_all')
                        ->label('Total Poin')
                        ->numeric()
                        ->default(0),
                        
                    Toggle::make('update_poin_to_profil')
                        ->label('Poin Diupdate ke Profil')
                        ->default(0),
                ]),
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pertandingan_id')
                ->label('Pertandingan')
                ->relationship('pertandingan', 'judul')
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
            'index' => Pages\ListTebakPertandingans::route('/'),
            'create' => Pages\CreateTebakPertandingan::route('/create'),
            'edit' => Pages\EditTebakPertandingan::route('/{record}/edit'),
        ];
    }
}
