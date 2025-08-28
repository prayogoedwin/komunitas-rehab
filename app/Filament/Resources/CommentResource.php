<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use App\Models\Forum;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
                Select::make('forum_id')
                    ->options(Forum::all()->pluck('judul', 'id'))
                    ->searchable(),
                Textarea::make('comment')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('forum.judul'),
                TextColumn::make('comment'),
                TextColumn::make('user.name')
                    ->label('Nama')
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->is_admin_comment == 1) {
                            $user = \App\Models\User::find($record->user_id);
                            return $user ? $user->name . '(Admin)' : '-';
                        }
                        return $state;
                    })
                    ->html()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
                            'updated_by' => Auth::user()->id,
                            'is_show' => 1
                        ]);
                    })
                    ->visible(fn($record) => $record->is_show == 0),
                Tables\Actions\Action::make('verify')
                    ->label('Sembunyikan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Sembunyikan Komentar')
                    ->modalSubheading('Apakah Anda yakin ingin menyembunyikan komentar ini?')
                    ->modalButton('Ya, Sembunyikan')
                    ->action(function ($record) {
                        $record->update([
                            'updated_by' => Auth::user()->id,
                            'is_show' => 0
                        ]);
                    })
                    ->visible(fn($record) => $record->is_show == 1),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
