@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div class="flex flex-col">

    <x-store.navbar />

    <div class="flex flex-col mx-20 mt-5">
        @if ($orders->isEmpty())
            <div class="bg-white shadow p-5 my-5 py-10 mt-3 text-center">
                <h1 class="text-[20px] font-semibold">Tidak ada pesanan saat ini.</h1>
            </div>
        @else
            <div class="flex justify-between items-center p-5 bg-white shadow">
                <div class="font-medium">
                    <h1>Daftar Pesanan Anda</h1>
                </div>
                <div class="flex font-medium justify-center items-center gap-x-20 mr-5">
                    <h1>Harga Satuan</h1>
                    <h1>Kuantitas</h1>
                    <h1>Status</h1>
                    <h1>Aksi</h1>
                </div>
            </div>
            @foreach ($orders as $order)
                <div class="bg-white shadow p-5 py-7 mt-3 flex justify-between items-center mb-7">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $order->image) }}" alt="" class="object-cover rounded h-24 w-24">
                        <div class="flex flex-col ml-5">
                            <h1 class="font-medium text-[20px]">{{ $order->name }}</h1>
                            <h1 class="text-[14px] text-slate-600">{{ $order->category }}</h1>
                        </div>
                    </div>
                    <div class="flex font-medium justify-center items-center gap-x-20 text-center mr-4">
                        <h1 class="mr-12">{{ $order->price }}</h1>
                        <h1 class="mr-6">{{ $order->qty }}</h1>
                        <h1>{{ $order->status }}</h1>
                        <img src="https://img.icons8.com/material-sharp/24/FFFFFF/waste.png" alt=""
                            class="h-7 w-7 rounded p-1 bg-red-500 cursor-pointer hover:scale-[1.1] transition-all"
                            wire:click='deleteOrder({{ $order->id }})'>
                    </div>
                </div>
            @endforeach
            <div class="flex text-[20px] font-medium mb-10 justify-between items-center p-5 bg-white shadow">
                <div class="font-medium">
                    <h1>Total Harga</h1>
                </div>
                <div class="flex font-medium justify-center items-center gap-x-20 mr-5">
                    <h1>Rp.{{ $subtotal }}</h1>
                </div>
            </div>
        @endif

    </div>

</div>

<script>
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
