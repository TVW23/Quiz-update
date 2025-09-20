<?php

namespace App\Filament\Admin\Resources\Questions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                TextInput::make('identifier')
                    ->required(),
                TextInput::make('question')
                    ->required(),
            ]);
    }
}
