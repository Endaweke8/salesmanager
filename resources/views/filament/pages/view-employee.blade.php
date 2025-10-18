<x-filament::page>
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-start justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $record->name }}</h2>
                <p class="text-gray-600 text-sm mt-1">{{ $record->position }} • {{ $record->email }}</p>
                <p class="text-gray-500 text-sm">Hired: {{ optional($record->hired_at)->format('Y-m-d') }}</p>
            </div>

            <a href="{{ \App\Filament\Resources\EmployeeResource::getUrl('index') }}"
                class="px-3 py-1 border rounded text-sm">
                ← Back to Employees
            </a>
        </div>

        {{-- Main content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left: Employee details --}}
            <div class="lg:col-span-1 bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold mb-3">Profile Info</h3>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li><strong>Phone:</strong> {{ $record->phone ?? '-' }}</li>
                    <li><strong>Email:</strong> {{ $record->email ?? '-' }}</li>
                    <li><strong>Position:</strong> {{ $record->position ?? '-' }}</li>
                    <li><strong>Status:</strong> {{ ucfirst($record->status ?? '-') }}</li>
                </ul>
            </div>

            {{-- Right: Progress widget --}}
            <div class="lg:col-span-2">
                @livewire('employee-progress', ['employeeId' => $record->id])
            </div>

        </div>

    </div>
</x-filament::page>
