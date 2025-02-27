<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';
    protected static ?string $navigationLabel = 'Комментарии';
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('post_id')
                    ->relationship('post', 'title')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Textarea::make('content')->required(),
                Forms\Components\Toggle::make('approved')->label('Одобрено'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.title')->label('Статья')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь')->sortable(),
                Tables\Columns\TextColumn::make('content')->limit(50),
                Tables\Columns\BooleanColumn::make('approved')->label('Одобрено'),
            ])
            ->filters([
                SelectFilter::make('approved')->options([
                    true => 'Одобренные',
                    false => 'Неодобренные',
                ]),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Одобрить')
                    ->action(fn (Comment $comment) => $comment->update(['approved' => true])),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
        ];
    }
}