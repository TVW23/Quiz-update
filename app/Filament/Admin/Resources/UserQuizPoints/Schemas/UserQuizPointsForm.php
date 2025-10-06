<?php

namespace App\Filament\Admin\Resources\UserQuizPoints\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserQuizPointsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                TextInput::make('points')
                    ->required()
                    ->numeric(),
            ]);
    }
}
