@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
    <x-adminpage.navbar />
    <div class="ml-80">
        @yield('adminpage')
    </div>
</div>
