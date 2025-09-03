<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForumResource\Pages;
use App\Filament\Resources\ForumResource\RelationManagers;
use App\Models\Forum;
use App\Models\KategoriMaster;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ForumResource extends Resource
{
    protected static ?string $model = Forum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Forum')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')->readOnly(),
                Select::make('kategori_id')
                    ->label('Kategori Forum')
                    ->options(KategoriMaster::where('jenis_kategori', 'forum')->pluck('nama_kategori', 'id'))
                    ->searchable()
                    ->required(),
                Textarea::make('deskripsi')->required()->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.name'),
                TextColumn::make('judul'),
                TextColumn::make('created_at'),
                TextColumn::make('verified_at')
                    ->getStateUsing(fn($record) => $record->verified_at ? 'Verified' : 'Unverified')
                    ->badge()
                    ->color(fn($state) => $state === 'Verified' ? 'success' : 'danger'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('verify')
                    ->label('Verify')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Verifikasi Data')
                    ->modalSubheading('Apakah Anda yakin ingin memverifikasi data ini?')
                    ->modalButton('Ya, Verifikasi')
                    ->action(function ($record) {
                        $record->update([
                            'verified_at' => now(),
                            'verified_by' => Auth::user()->id
                        ]);
                        Cache::forget('forum_member');
                    })
                    ->hidden(function ($record) {
                        return $record->verified_at !== null;
                    }),

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
            'index' => Pages\ListForums::route('/'),
            'create' => Pages\CreateForum::route('/create'),
            'edit' => Pages\EditForum::route('/{record}/edit'),
        ];
    }
}
