@component('mail::message')
# Welcome to {{ config('app.name') }}

Dear User,

This is a reminder email to inform you about an upcoming quiz.

Your registered email with us is: email
{{-- {{ $user['email'] }} --}}

We appreciate your participation and wish you the best of luck with the quiz!

Thanks for being a part of {{ config('app.name') }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
