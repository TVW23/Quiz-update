<?php

namespace App\Filament\Admin\Resources\Answers;

use App\Filament\Admin\Resources\Answers\Pages\CreateAnswer;
use App\Filament\Admin\Resources\Answers\Pages\EditAnswer;
use App\Filament\Admin\Resources\Answers\Pages\ListAnswers;
use App\Filament\Admin\Resources\Answers\Schemas\AnswerForm;
use App\Filament\Admin\Resources\Answers\Tables\AnswersTable;
use App\Models\Answer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'asnswer';

    public static function form(Schema $schema): Schema
    {
        return AnswerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnswersTable::configure($table);
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
            'index' => ListAnswers::route('/'),
            'create' => CreateAnswer::route('/create'),
            'edit' => EditAnswer::route('/{record}/edit'),
        ];
    }
}
