<?php

namespace App\Imports;

use App\Models\Quiz;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class QuizImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading
{
    protected $errors = [];
    protected $successCount = 0;
    protected $questionMax = 5;
    protected $answersMax = 4;

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            try {
                $quiz = Quiz::create([
                    'name' => $row['name'],
                    'subcategory' => $row['subcategory'] ?? null,
                    'folder_guid' => $row['folder_guid'] ?? Str::uuid()->toString(), 
                ]);

                for ($question = 1; $question <= $this->questionMax; $question++) {
                    $questionText = $row["question_{$question}"] ?? null; 
                    if (!$questionText) {
                        continue;
                    }

                    $identifier = $row["question_{$question}_identifier"] ?? "Q{$question}";

                    $question = $quiz->questions()->create([
                        'identifier' => $identifier,
                        'question' => $questionText,
                    ]);

                    for ($answers = 1; $answers <= $this->answersMax; $answers++) {
                        $choiceText = $row["question_{$question}_choice_{$answers}"] ?? null; 
                        $isCorrect = $row["question_{$question}_choice_{$answers}_correct"] ?? null;
                        if ($choiceText && $isCorrect !== null) {
                            $question->answers()->create([
                                'choice' => $choiceText,
                                'is_correct' => filter_var($isCorrect, FILTER_VALIDATE_BOOLEAN),
                            ]);
                        }
                    }
                }

                $this->successCount++;
            } catch (\Exception $e) {
                $this->errors[] = [
                    'row' => $index + 2,
                    'name' => $row['name'] ?? 'N/A',
                    'error' => $e->getMessage(),
                ];
            }
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:quizzes,name',
            'subcategory' => 'nullable|string|max:255',
            'folder_guid' => 'nullable|uuid|unique:quizzes,folder_guid',
            '*.question_*' => 'nullable|string',
            '*.question_*_identifier' => 'nullable|string|unique:questions,identifier',
            '*.question_*_choice_*' => 'nullable|string',
            '*.question_*_choice_*_correct' => 'nullable|boolean|string',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}