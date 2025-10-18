<x-filament-widgets::widget>
    <x-filament::section>
        <div class="p-6 bg-white rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Progress for {{ $selectedDate }}</h3>
            <input type="date" wire:model="selectedDate" class="border rounded px-2 py-1 text-sm mb-3">
            <p>Target: <strong>{{ number_format($targetAmount, 2) }} ETB</strong></p>
            <p>Achieved: <strong>{{ number_format($achievedAmount, 2) }} ETB</strong></p>
            <p>Progress: <strong>{{ $progress }}%</strong></p>

            <div class="w-full bg-gray-200 rounded-full h-3 mt-2">
                <div class="bg-emerald-500 h-3 rounded-full" style="width: {{ $progress }}%;"></div>
            </div>
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
