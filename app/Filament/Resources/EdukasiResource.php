<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EdukasiResource\Pages;
use App\Filament\Resources\EdukasiResource\RelationManagers;
use App\Models\Edukasi;
use App\Models\KategoriMaster;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Storage;

class EdukasiResource extends Resource
{
    protected static ?string $model = Edukasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view edukasis');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view edukasis');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view edukasis');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create edukasis');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit edukasis');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete edukasis');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete edukasis');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Edukasi')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('cover')
                            // ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('edukasi')
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return (string) Str::random(40) . '.' . $file->getClientOriginalExtension();
                            })
                            ->deleteUploadedFileUsing(function ($file) {
                                Storage::disk('public')->delete($file);
                            }),
                        TextInput::make('judul')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')->readOnly(),
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->options(KategoriMaster::where('jenis_kategori', 'edukasi')->pluck('nama_kategori', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('deskripsi_singkat')->required(),
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
            'index' => Pages\ListEdukasis::route('/'),
            'create' => Pages\CreateEdukasi::route('/create'),
            'edit' => Pages\EditEdukasi::route('/{record}/edit'),
        ];
    }
}
