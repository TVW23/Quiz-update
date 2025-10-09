<?php

namespace App\Filament\Admin\Resources\UserQuizPoints\Pages;

use App\Filament\Admin\Resources\UserQuizPoints\UserQuizPointsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserQuizPoints extends EditRecord
{
    protected static string $resource = UserQuizPointsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
