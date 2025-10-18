<x-filament::widget style="width:100%; display:block; margin:0; padding:0;">
    <x-filament::card
        style="width:100%; border:1px solid #e5e7eb; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.08); overflow:hidden; padding:20px;">

        <!-- Header -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
            <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">
                Employee Daily & Monthly Sales Progress
            </h2>
            <div>
                {{ $this->form }}
            </div>
        </div>

        <!-- Table -->
        <table
            style="width:100%; border-collapse:collapse; font-size:14px; border:1px solid #e5e7eb; border-radius:8px; overflow:hidden;">
            <thead style="background-color:#f9fafb; border-bottom:2px solid #e5e7eb;">
                <tr>
                    <th style="text-align:left; padding:12px; font-weight:600; color:#374151;">Employee</th>
                    <th style="text-align:right; padding:12px; font-weight:600; color:#374151;">
                        Sales ({{ \Carbon\Carbon::parse($selectedDate)->format('M d, Y') }})
                    </th>
                    <th style="text-align:right; padding:12px; font-weight:600; color:#374151;">Monthly Goal</th>
                    <th style="text-align:right; padding:12px; font-weight:600; color:#374151;">Daily Progress</th>
                    <th style="text-align:right; padding:12px; font-weight:600; color:#374151;">Monthly Progress</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($this->getData() as $data)
                    @php
                        $dailyColor =
                            $data['daily_progress'] >= 100
                                ? '#16a34a' // green
                                : ($data['daily_progress'] >= 70
                                    ? '#f59e0b'
                                    : '#dc2626'); // yellow/red

                        $monthlyColor =
                            $data['monthly_progress'] >= 100
                                ? '#16a34a'
                                : ($data['monthly_progress'] >= 70
                                    ? '#f59e0b'
                                    : '#dc2626');
                    @endphp

                    <tr style="border-top:1px solid #e5e7eb; transition:background-color 0.2s;"
                        onmouseover="this.style.backgroundColor='#f9fafb';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        <td style="padding:12px; font-weight:500; color:#111827;">{{ $data['name'] }}</td>
                        <td style="padding:12px; text-align:right; color:#374151;">{{ $data['sales'] }}</td>
                        <td style="padding:12px; text-align:right; color:#374151;">{{ $data['goal'] }}</td>

                        <!-- Daily Progress -->
                        <td style="padding:12px; text-align:right;">
                            <span
                                style="
                                background-color:{{ $dailyColor }}20;
                                color:{{ $dailyColor }};
                                padding:4px 8px;
                                border-radius:6px;
                                font-weight:600;
                            ">
                                {{ $data['daily_progress'] }}%
                            </span>
                        </td>

                        <!-- Monthly Progress -->
                        <td style="padding:12px; text-align:right;">
                            <span
                                style="
                                background-color:{{ $monthlyColor }}20;
                                color:{{ $monthlyColor }};
                                padding:4px 8px;
                                border-radius:6px;
                                font-weight:600;
                            ">
                                {{ $data['monthly_progress'] }}%
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-filament::card>
</x-filament::widget>
