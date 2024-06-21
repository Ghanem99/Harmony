<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Answer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AnswerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnswerResource\RelationManagers;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Survey Management';
    public static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('answer')
                    ->label('Answer')
                    ->required(),
                TextInput::make('score')
                    ->label('Score')
                    ->required(),
                Forms\Components\BelongsToSelect::make('question_id')
                    ->relationship('question', 'question')
                    ->label('Question')
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('answer')
                    ->label('Answer'),
                TextColumn::make('score')
                    ->label('Score'),
                TextColumn::make('question.question')
                    ->label('Question')
                    ->searchable()
                    ->disabled()
                    ->default('Question Title'),
                TextColumn::make('question.survey.title')
                    ->label('Survey')
                    ->searchable()
                    ->disabled()
                    ->default('Survey Title'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('question_id')
                    ->label('Question')
                    ->relationship('question', 'question'), 
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
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
