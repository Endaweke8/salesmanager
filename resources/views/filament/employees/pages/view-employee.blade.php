<x-filament::page>
    <div class="space-y-6">

        {{-- Top header: employee info --}}
        <div class="flex items-start justify-between gap-6">
            <div>
                <h2 class="text-2xl font-semibold">
                    {{ $record->name ?? 'Employee' }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    {{ $record->position ?? '-' }} • {{ $record->email ?? '-' }}
                </p>
                <p class="text-sm text-gray-500 mt-2">
                    Hired at: {{ optional($record->hired_at)->format('Y-m-d') ?? '-' }}
                </p>
            </div>

            <div class="text-right">
                <a href="{{ \App\Filament\Resources\Employees\EmployeeResource::getUrl('index') }}"
                    class="inline-block px-3 py-1 border rounded text-sm">
                    ← Back to employees
                </a>
            </div>
        </div>

        {{-- Row: left = details, right = progress widget (Livewire) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Details card --}}
            <div class="lg:col-span-1 bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Profile</h3>
                <div class="text-sm text-gray-700 space-y-2">
                    <div><strong>Phone:</strong> {{ $record->phone ?? '-' }}</div>
                    <div><strong>Email:</strong> {{ $record->email ?? '-' }}</div>
                    <div><strong>Position:</strong> {{ $record->position ?? '-' }}</div>
                    <div><strong>Status:</strong> {{ ucfirst($record->status ?? '-') }}</div>
                </div>
            </div>

            {{-- Progress area uses Livewire component (full width on small screens) --}}
            <div class="lg:col-span-2">
                {{-- Embed your Livewire component that shows progress for selected date.
                    We pass employeeId = $record->id so component loads correct goal & sales. --}}
                @livewire('employee-progress', ['employeeId' => $record->id])
            </div>
        </div>

        {{-- Optional: other sections (sales list, goals history, etc.) --}}
    </div>
</x-filament::page>
