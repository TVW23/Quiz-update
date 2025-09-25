<?php
namespace App\Filament\Admin\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class QuizImport extends Page
{
    protected string $view = 'filament.admin.pages.quiz-import';

    public $file;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\FileUpload::make('file')
                ->label('Upload CSV')
                ->required()
                ->acceptedFileTypes(['text/csv']),
        ];
    }

    public function submit()
    {
        $path = $this->file->store('imports');
        $handle = fopen(storage_path('app/' . $path), 'r');
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            // Example: [id, quiz_name]
            DB::table('quizzes')->updateOrInsert(
                ['id' => $data[0]],
                ['quiz_name' => $data[1]]
            );
        }
        fclose($handle);

        $this->notify('success', 'Quiz table updated!');
    }
}