@component('mail::message')
    # ⚠️ Hello {{ $employee->name }},

    Your sales performance is slightly behind schedule. Let’s catch up!

    **Performance Summary:**
    - 💰 **Today’s Sales:** {{ number_format($todaySales, 2) }} ETB
    - 📅 **Total This Month:** {{ number_format($sales, 2) }} ETB
    - 🎯 **Monthly Goal:** {{ number_format($goal, 2) }} ETB

    Stay focused — every sale brings you closer to success.



    Keep pushing forward,
    **{{ config('app.name') }} Team**
@endcomponent
