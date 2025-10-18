<x-filament::page>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $record->name }}</h2>
                <p class="text-gray-600">{{ $record->position }} — {{ $record->email }}</p>
            </div>

            <a href="{{ \App\Filament\Resources\EmployeeResource::getUrl('index') }}"
                class="px-3 py-1 text-sm border rounded">
                ← Back
            </a>
        </div>

        {{-- Profile Info --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg mb-3">Employee Details</h3>
            <ul class="text-sm space-y-1">
                <li><strong>Phone:</strong> {{ $record->phone ?? '-' }}</li>
                <li><strong>Status:</strong> {{ ucfirst($record->status ?? '-') }}</li>
                <li><strong>Hired at:</strong> {{ $record->hired_at ?? '-' }}</li>
            </ul>
        </div>

        {{-- Livewire Widget (optional) --}}
        <div class="bg-white rounded-xl shadow p-6">
            @livewire('employee-progress', ['employeeId' => $record->id])
        </div>

    </div>
</x-filament::page>
