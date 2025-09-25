<?php

namespace App\Filament\Actions;

use App\Imports\QuizImport;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class ImportQuizAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->name('import_quizzes') // Matches QuizzesTable.php
            ->label('Import Quizzes from Excel')
            ->color('success')
            ->icon('heroicon-m-arrow-up-tray')
            ->form([
                FileUpload::make('excel_file')
                    ->label('Upload Excel File')
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                        'application/vnd.ms-excel', // .xls
                        'text/csv', // .csv
                    ])
                    ->required()
                    ->maxSize(51200) // 50MB max
                    ->storeFiles(false) // Keep temporary
                    ->directory('excel-imports'),
            ])
            ->action(function (array $data): void {
                $file = $data['excel_file'];

                if (!$file instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    Notification::make()
                        ->title('Import Failed')
                        ->body('Invalid file uploaded.')
                        ->danger()
                        ->send();
                    return;
                }

                $filePath = $file->getRealPath();
                $importer = new QuizImport();
                Excel::import($importer, $filePath);

                $file->delete();

                $successCount = $importer->getSuccessCount();
                $errors = $importer->getErrors();

                if ($errors) {
                    Notification::make()
                        ->title('Import Completed with Errors')
                        ->body("Imported {$successCount} quizzes. Errors: " . count($errors))
                        ->danger()
                        ->send();
                } else {
                    Notification::make()
                        ->title('Import Successful')
                        ->body("Imported {$successCount} quizzes.")
                        ->success()
                        ->send();
                }

                $this->getLivewire()->dispatch('refreshQuizzesTable');
            })
            ->modalSubmitActionLabel('Import');
    }
}