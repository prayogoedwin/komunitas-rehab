<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyekResource\Pages;
use App\Filament\Resources\ProyekResource\RelationManagers;
use App\Models\KategoriMaster;
use App\Models\Proyek;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view proyeks');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view proyeks');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view proyeks');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create proyeks');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit proyeks');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete proyeks');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete proyeks');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Proyek')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('cover')
                            // ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('proyek')
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return (string) Str::random(40) . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(function ($file) {
                                Storage::disk('public')->delete($file);
                            })
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('judul')
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->required(),
                            TextInput::make('slug')->readOnly(),
                            Select::make('kategori_id')
                                ->label('Status Proyek')
                                ->options(KategoriMaster::where('jenis_kategori', 'proyek')->pluck('nama_kategori', 'id'))
                                ->searchable()
                                ->required(),
                            TextInput::make('deskripsi_singkat')->required(),
                            DatePicker::make('from_date')->required()->label('Tanggal Mulai'),
                            DatePicker::make('to_date')->required()->label('Tanggal Selesai'),
                            TextInput::make('jumlah_peserta')->numeric()->required(),
                        ]),
                        RichEditor::make('deskripsi')->required()->columnSpan('full'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->disk('public')->label('Cover')->height(100),
                TextColumn::make('judul')->searchable(),
                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->searchable()
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
            'index' => Pages\ListProyeks::route('/'),
            'create' => Pages\CreateProyek::route('/create'),
            'edit' => Pages\EditProyek::route('/{record}/edit'),
        ];
    }
}
