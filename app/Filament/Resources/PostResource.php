<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;


use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $pluralModelLabel = 'Посты';
    protected static ?string $model = Post::class;
   // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';  
    protected static ?string $navigationIcon = 'heroicon-o-document-text';  
    public static function form(Form $form): Form
 {
        return $form
            ->schema([
                TextInput::make('title')->label('Заголовок'),
                RichEditor::make('content')->label('Описание')->required(),                 
                // FileUpload::make('image')->directory('posts')->image(),
                FileUpload::make('image')->label('Изображение')->directory('posts')->disk('public')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable(),
                ImageColumn::make('image')->square()->size(80)->disk('public'),
                TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];

    }
}