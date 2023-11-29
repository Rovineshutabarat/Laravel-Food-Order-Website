@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Daftar Produk</h1>
        <div class="flex items-center justify-between">
            <a href="{{ route('adminpage.add.product') }}" class="flex items-center justify-center gap-x-2">
                <button class="btn btn-sm btn-neutral">Tambah Produk</button>
                <button class="bg-white shadow btn btn-sm">+</button>
            </a>
            <div class="flex items-center justify-center gap-x-3">
                <select class="rounded select select-bordered select-sm" wire:model.live='productCategory'>
                    <option selected hidden>Kategori</option>
                    <option value="">Semua</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>
                <select class="rounded select select-bordered select-sm" wire:model.live='productFilter'>
                    <option value="">Filter</option>
                    <option value="rating">Rating</option>
                    <option value="harga">Harga</option>
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
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr class="even:bg-slate-100 odd:bg-white">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>Rp.{{ $product->price }}</td>
                            <td>{{ Str::limit($product->image, 35, '...') }}</td>
                            <td>{{ number_format($product->average_rating, 1) }}</td>
                            <td class="flex justify-center items-center gap-x-1">
                                <img src="https://img.icons8.com/material-rounded/24/FFFFFF/edit--v1.png" alt="Edit_Button"
                                    class="h-7 w-7 p-1 bg-green-500 rounded hover:scale-[1.1] transition-all"
                                    wire:click="edit({{ $product->id }})">
                                <img src="https://img.icons8.com/material-sharp/24/FFFFFF/waste.png" alt="Edit_Button"
                                    class="h-7 w-7 p-1 bg-red-500 rounded hover:scale-[1.1] transition-all"
                                    wire:click="delete({{ $product->id }})">
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="flex items-center justify-center">
            {{ $products->links('pagination::simple-tailwind') }}
        </div>

    </div>

    <script>
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
    </script>
@endsection
