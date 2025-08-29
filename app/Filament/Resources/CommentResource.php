<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use App\Models\Forum;
use Filament\Forms;
<<<<<<< HEAD
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
>>>>>>> b3a9fbf81fd788b1b01e6bbac97f30275fa6b463
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('comments')
                    ->relationship('comment')
                    ->schema([
                        Textarea::make('comment')->label('Komentar'),
                        TextInput::make('user_name')
                            ->label('Nama Pengirim Komentar')
                            ->disabled()
                            ->formatStateUsing(function ($record) {
                                if (! $record) {
                                    return null;
                                }
                                // Jika komentar dari admin
                                if ($record->is_admin_comment == 1) {
                                    $user = \App\Models\User::find($record->user_id);
                                    return $user ? $user->name . ' (Admin)' : '-';
                                }

                                // Jika komentar dari user biasa
                                return $record->user?->name ?? '-';
                            }),
                        Hidden::make('is_admin_comment')->default(1),
                        Hidden::make('updated_by')->default(Auth::user()->id),
                        Hidden::make('created_by')->default(Auth::user()->id),
                        Hidden::make('user_id')->default(Auth::user()->id),
                        Toggle::make('is_show')
                            ->label('Ditampilkan?'),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Forum')
                    ->searchable(),
                TextColumn::make('comment_count')
                    ->label('Jumlah Komentar'),
                TextColumn::make('likes_count')
                    ->label('Jumlah Like'),
                TextColumn::make('viewers')
                    ->label('Jumlah Viewer'),
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

    public static function getEloquentQuery(): Builder
    {
        return Forum::query()
            ->withCount('comment')
            ->withCount('likes');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
