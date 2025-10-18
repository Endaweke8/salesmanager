@component('mail::message')
    # 🎉 Great job, {{ $employee->name }}!

    You’re on track to hit your monthly sales goal.

    **Performance Summary:**
    - 💰 **Today’s Sales:** {{ number_format($todaySales, 2) }} ETB
    - 📅 **Total This Month:** {{ number_format($sales, 2) }} ETB
    - 🎯 **Monthly Goal:** {{ number_format($goal, 2) }} ETB

    Keep up the great work and stay consistent!

    Thanks,
    {{ config('app.name') }}
@endcomponent
