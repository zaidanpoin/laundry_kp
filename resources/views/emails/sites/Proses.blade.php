@component('mail::message')
Status Pesanan Anda : <b>DiProses</b>

Pesanan Anda Sedang Di Proses Mohon Menunggu 1-3 Hari Jam Kerja

@component('mail::button', ['url' => ''])
Di Proses
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
