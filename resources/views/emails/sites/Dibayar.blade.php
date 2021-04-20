@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
