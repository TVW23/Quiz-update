<?php

namespace App\Filament\Admin\Resources\UserQuizPoints;

use App\Filament\Admin\Resources\UserQuizPoints\Pages\CreateUserQuizPoints;
use App\Filament\Admin\Resources\UserQuizPoints\Pages\EditUserQuizPoints;
use App\Filament\Admin\Resources\UserQuizPoints\Pages\ListUserQuizPoints;
use App\Filament\Admin\Resources\UserQuizPoints\Schemas\UserQuizPointsForm;
use App\Filament\Admin\Resources\UserQuizPoints\Tables\UserQuizPointsTable;
use App\Models\UserQuizPoints;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserQuizPointsResource extends Resource
{
    protected static ?string $model = UserQuizPoints::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User quiz points';

    public static function form(Schema $schema): Schema
    {
        return UserQuizPointsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserQuizPointsTable::configure($table);
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
            'index' => ListUserQuizPoints::route('/'),
            'create' => CreateUserQuizPoints::route('/create'),
            'edit' => EditUserQuizPoints::route('/{record}/edit'),
        ];
    }
}
