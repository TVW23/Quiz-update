<?php

namespace App\Filament\Admin\Resources\UserQuizPoints\Pages;

use App\Filament\Admin\Resources\UserQuizPoints\UserQuizPointsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserQuizPoints extends ListRecords
{
    protected static string $resource = UserQuizPointsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
