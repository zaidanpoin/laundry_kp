@component('mail::message')
Status Pesanan Anda : <b>Selesai</b>

Pesanan anda telah selesai harap mengambil dioutlet kami.

@component('mail::button', ['url' => ''])
selesai
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
