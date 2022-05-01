@component('mail::layouts')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            سام بلاگ
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
@endcomponent
