<?php

namespace App\Filament\Admin\Resources\Quizzes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quiz_name')
                    ->required(),
            ]);
    }
}
