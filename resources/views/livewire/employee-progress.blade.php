<div>
    <div class="flex justify-between items-center mb-4">
        <div>
            <label for="date" class="text-sm text-gray-700 dark:text-gray-300">Select Date:</label>
            <input type="date" id="date" wire:model="selectedDate"
                class="border-gray-300 rounded-lg text-sm dark:bg-gray-800 dark:text-gray-100" />
        </div>

        <div class="text-sm text-gray-500">
            Goal: <strong>{{ number_format($targetAmount, 2) }} ETB</strong>
        </div>
    </div>

    <div class="w-full bg-gray-200 rounded-full h-4 dark:bg-gray-700">
        <div class="bg-emerald-500 h-4 rounded-full transition-all duration-500" style="width: {{ $progress }}%">
        </div>
    </div>

    <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">
        Achieved: <strong>{{ number_format($achievedAmount, 2) }} ETB</strong> —
        <span class="text-emerald-600 dark:text-emerald-400 font-semibold">{{ $progress }}%</span> of goal
    </p>
</div>
