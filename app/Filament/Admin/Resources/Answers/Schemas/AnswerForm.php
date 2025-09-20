<?php

namespace App\Filament\Admin\Resources\Answers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnswerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question_id')
                    ->required()
                    ->numeric(),
                TextInput::make('choice')
                    ->required(),
                Toggle::make('is_correct')
                    ->required(),
            ]);
    }
}
