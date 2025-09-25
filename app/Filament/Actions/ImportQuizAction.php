<?php

namespace App\Filament\Actions;

use App\Imports\QuizImport;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class ImportQuizAction extends Action
{
    protected int $fileSize = 51200;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->name('import_quizzes')
            ->label('Import Quizzes from Excel')
            ->color('success')
            ->icon('heroicon-m-arrow-up-tray')
            ->schema([
                FileUpload::make('excel_file')
                    ->label('Upload Excel File')
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-excel',
                        'text/csv',
                    ])
                    ->required()
                    ->maxSize($this->fileSize)
                    ->storeFiles(false)
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