@component('mail::message')
    # Introduction

    Please click the link below to verify your email.

@component('mail::button', ['url' => $url])
    Verify
@endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
