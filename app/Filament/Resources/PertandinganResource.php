<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PertandinganResource\Pages;
use App\Filament\Resources\PertandinganResource\RelationManagers;
use App\Models\Pertandingan;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\TebakPertandinganResource;

use Livewire\TemporaryUploadedFile;

class PertandinganResource extends Resource
{
    protected static ?string $model = Pertandingan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

         //setting letak grup menu
    protected static ?string $navigationGroup = 'Pertandingan';
    protected static ?int $navigationSort = 2; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Data Pertandingan';
    protected static ?string $pluralModelLabel = 'Data Pertandingan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Section::make('Info Pertandingan')
                ->schema([
                    TextInput::make('judul')
                        ->label('Judul Pertandingan)')
                        ->default(null),
                    Toggle::make('is_special')
                        ->label('Pertandingan Spesial?')
                        ->inline(false),
                        
                    Select::make('kategori')
                        ->label('Kategori Pertandingan')
                        ->options(
                            Kategori::all()->pluck('nama', 'id')->toArray()
                        )
                        ->default(0)
                        ->required(),
                        
                    DatePicker::make('tanggal_pertandingan')
                        ->label('Tanggal Pertandingan')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                        
                    TimePicker::make('jam_pertandingan')
                        ->label('Jam Pertandingan')
                        ->seconds(false)
                        ->displayFormat('H:i'),
                        
                    DatePicker::make('expired_at')
                        ->label('Expired At')
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                        
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            0 => 'Nonaktif',
                            1 => 'Aktif',
                            2 => 'Selesai',
                        ])
                        ->default(0)
                        ->required(),
                ])
                ->columns(2),
                
            Section::make('Pemain 1')
                ->schema([
                    TextInput::make('pemain_1_id')
                        ->label('ID Pemain (DEFAULT)')
                        ->numeric()
                        ->default(1)
                        ->readonly(),
                        
                    TextInput::make('pemain_1_nama')
                        ->label('Nama Pemain')
                        ->required(),

                    FileUpload::make('pemain_1_foto')
                        ->label('Foto Pemain')
                        ->disk('public') // PASTIKAN INI ADA
                        ->image()
                        ->directory('pertandingan') // Folder penyimpanan
                        ->preserveFilenames(false) // <-- Biar nama file diacak (hash)
                        ->maxSize(2048) // 2MB
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('800')
                        ->imageResizeTargetHeight('600')
                        ->columnSpanFull()
                        ->required(fn (string $context): bool => $context === 'create') // Hanya required saat create
                        ->required(),
                    
                        
                    TextInput::make('pemain_1_url_detail')
                        ->label('URL Detail Pemain')
                        ->url(),
                        
                    // TextInput::make('pemain_1_jago')
                    //     ->label('Jumlah Vote Jago')
                    //     ->numeric()
                    //     ->default(0),
                ])
                ->columns(2),
                
            Section::make('Pemain 2')
                ->schema([
                     TextInput::make('pemain_2_id')
                        ->label('ID Pemain (DEFAULT)')
                        ->numeric()
                        ->default(2)
                        ->readonly(),
                        
                    TextInput::make('pemain_2_nama')
                        ->label('Nama Pemain')
                        ->required(),

                    FileUpload::make('pemain_2_foto')
                        ->label('Foto Pemain')
                        ->disk('public') // PASTIKAN INI ADA
                        ->image()
                        ->directory('pertandingan') // Folder penyimpanan
                        ->preserveFilenames(false) // <-- Biar nama file diacak (hash)
                        ->maxSize(2048) // 2MB
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('800')
                        ->imageResizeTargetHeight('600')
                        ->columnSpanFull()
                        ->required(fn (string $context): bool => $context === 'create') // Hanya required saat create
                        ->required(),
                        
                        
                    TextInput::make('pemain_2_url_detail')
                        ->label('URL Detail Pemain')
                        ->url(),
                        
                    // TextInput::make('pemain_2_jago')
                    //     ->label('Jumlah Vote Jago')
                    //     ->numeric()
                    //     ->default(0),
                ])
                ->columns(2),
                
            Section::make('Hasil Pertandingan')
                ->schema([
                    Select::make('pemenang')
                        ->label('Pemenang')
                        ->options([
                            0 => 'Belum Ada',
                            1 => 'Pemain 1',
                            2 => 'Pemain 2',
                        ])
                        ->default(0),
                        
                    TextInput::make('pemenang_poin')
                        ->label('Poin Pemenang')
                        ->numeric()
                        ->default(0),
                        
                    Select::make('metode_menang')
                        ->label('Metode Menang')
                        ->options([
                            // Sesuaikan dengan kategori UFC
                            0 => 'KO/TKO',
                            1 => 'Submission',
                            2 => 'Decision',
                            3 => 'Diskualifikasi',
                            4 => 'Tanpa Kontes',
                        ])
                        ->default(0),
                        
                    TextInput::make('metode_menang_poin')
                        ->label('Poin Metode Menang')
                        ->numeric()
                        ->default(0),
                        
                    TextInput::make('ronde')
                        ->label('Ronde')
                        ->numeric()
                        ->default(0),
                        
                    TextInput::make('ronde_poin')
                        ->label('Poin Ronde')
                        ->numeric()
                        ->default(0),
                ])
                ->columns(2),
                
            Section::make('Media')
                ->schema([
                    TextInput::make('url_nonton_1')
                        ->label('URL Nonton 1')
                        ->url(),
                        
                    TextInput::make('url_nonton_2')
                        ->label('URL Nonton 2')
                        ->url(),
                        
                    TextInput::make('url_nonton_3')
                        ->label('URL Nonton 3')
                        ->url(),

                     FileUpload::make('poster_pertand')
                        ->label('Foto Pemain')
                        ->disk('public') // PASTIKAN INI ADA
                        ->image()
                        ->directory('pertandingan') // Folder penyimpanan
                        ->preserveFilenames(false) // <-- Biar nama file diacak (hash)
                        ->maxSize(2048) // 2MB
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('800')
                        ->imageResizeTargetHeight('600')
                        ->columnSpanFull()
                        ->required(fn (string $context): bool => $context === 'create') // Hanya required saat create
                        ->required(),
                        
                   
                ])
                ->columns(1),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('judul')
                ->label('Judul')
                ->searchable()
                ->sortable(),

            IconColumn::make('is_special')
                ->label('Special')
                ->boolean()
                ->trueIcon('heroicon-o-star')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),
            
            // TextColumn::make('pemain_1_nama')
            //     ->label('Pemain 1')
            //     ->searchable()
            //     ->sortable(),
            
            // TextColumn::make('pemain_2_nama')
            //     ->label('Pemain 2')
            //     ->searchable()
            //     ->sortable(),
            
            TextColumn::make('pemenang_poin')
                ->label('Poin Pemenang')
                ->numeric()
                ->sortable()
                ->alignCenter(),
            
            TextColumn::make('tanggal_pertandingan')
                ->label('Tanggal Pertandingan')
                ->date('d M Y')
                ->sortable(),
            
            TextColumn::make('expired_at')
                ->label('Expired')
                ->date('d M Y')
                ->sortable()
                ->color(fn ($record) => $record->expired_at && $record->expired_at->isPast() ? 'danger' : 'success'),
            
            BadgeColumn::make('status')
                ->label('Status')
                ->formatStateUsing(fn ($state) => match ($state) {
                    0 => 'Nonaktif',
                    1 => 'Aktif',
                    2 => 'Selesai',
                    default => 'Unknown',
                })
                ->colors([
                    'danger' => 0,
                    'success' => 1,
                    'warning' => 2,
                ])
                ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                
                Tables\Actions\Action::make('tebakanMember')
                ->label('Tebakan')
                ->icon('heroicon-o-archive-box')
                ->color('info')
                ->url(fn (Pertandingan $record): string => TebakPertandinganResource::getUrl('index', [
                    'tableFilters[pertandingan_id][value]' => $record->id
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
            'index' => Pages\ListPertandingans::route('/'),
            'create' => Pages\CreatePertandingan::route('/create'),
            'edit' => Pages\EditPertandingan::route('/{record}/edit'),
        ];
    }
}
