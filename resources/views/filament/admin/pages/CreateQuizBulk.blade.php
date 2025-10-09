{{-- filepath: resources/views/filament/admin/pages/quiz-import.blade.php --}}
<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <x-filament::button type="submit">
            Import
        </x-filament::button>
    </form>
</x-filament::page>