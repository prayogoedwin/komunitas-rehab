<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

      //setting letak grup menu
    protected static ?string $navigationGroup = 'Web Setting';
    protected static ?int $navigationSort = 4; // Urutan setelah Kategori

    // Label
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';

      public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('view beritas');
    }

    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->can('view beritas');
    }

    public static function canView(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('view beritas');
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->can('create beritas');
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('edit beritas');
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return auth()->check() && auth()->user()->can('delete beritas');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->check() && auth()->user()->can('delete beritas');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('judul')->required(),
                RichEditor::make('deskripsi')->required()->columnSpan('full'),
                FileUpload::make('cover')
                    ->label('Cover Berita')
                    ->disk('public') // PASTIKAN INI ADA
                    ->image()
                    ->directory('cover-berita') // Folder penyimpanan
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
                TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y H:i') // Format: 22 Jul 2025 14:30
                    ->sortable(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
