@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Daftar Transaksi</h1>
        <div class="flex items-center justify-end">
            <div class="flex items-center gap-x-3">
                <select class="rounded select select-bordered select-sm" wire:model.live='productFilter'>
                    <option value="">Filter</option>
                    <option value="Paid">Dibayar</option>
                    <option value="Unpaid">Belum Dibayar</option>
                </select>
                <div class="form-control">
                    <div class="input-group flex items-center">
                        <input type="text" placeholder="Search…" wire:model.live="search"
                            class="rounded input input-bordered input-sm" />
                        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/search.png" alt=""
                            class="w-8 h-8 p-2 bg-slate-600">
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table overflow-hidden bg-white rounded text-center shadow table-sm">
                <thead class="text-white bg-slate-600">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Produk</th>
                        <th>No Telepon</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr class="even:bg-slate-100 odd:bg-white">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->product }}</td>
                            <td>Rp.{{ $order->phone_number }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->status }}</td>
                            <td class="flex justify-center items-center gap-x-1">
                                <div class="tooltip" data-tip="Ubah Status Pembayaran">
                                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/card-in-use.png" alt="Edit_Button"
                                        class="h-7 w-7 p-1 bg-blue-500 rounded hover:scale-[1.1] transition-all cursor-pointer"
                                        wire:click="pay({{ $order->id }})">
                                </div>
                                <img src="https://img.icons8.com/material-sharp/24/FFFFFF/waste.png" alt="Edit_Button"
                                    class="h-7 w-7 p-1 bg-red-500 rounded hover:scale-[1.1] transition-all cursor-pointer"
                                    wire:click="delete({{ $order->id }})">
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="flex items-center justify-center">
            {{ $orders->links('pagination::simple-tailwind') }}
        </div>

    </div>
@endsection
