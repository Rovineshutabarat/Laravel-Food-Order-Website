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
    window.addEventListener("update_product_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_product_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("create_product_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("create_product_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_role_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_role_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_category_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_category_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("create_category_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("create_category_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_category_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_category_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_profile_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_profile_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_status_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_status_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_order_fail", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_order_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
</script>
