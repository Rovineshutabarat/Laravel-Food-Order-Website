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

<script>
    window.addEventListener("success_notification", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    })

    window.addEventListener("err_notification", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    })
</script>
