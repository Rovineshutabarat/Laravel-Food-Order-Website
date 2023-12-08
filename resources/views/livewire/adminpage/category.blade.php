@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Kategori Produk</h1>
        <div class="flex items-center justify-between">
            <a href="{{ route('adminpage.product.category.add') }}" class="flex items-center justify-center gap-x-2">
                <button class="btn btn-sm btn-neutral text-white">Tambah Kategori</button>
                <button class="bg-white shadow btn btn-sm">+</button>
            </a>
            <div class="flex items-center justify-center gap-x-3">
                <select class="rounded select select-bordered select-sm" wire:model.live='categoryFilter'>
                    <option value="">Filter</option>
                    <option value="rating">Rating</option>
                    <option value="total_product">Total Produk</option>
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
                        <th>Nama Kategori</th>
                        <th>Deskripsi Kategori</th>
                        <th>Jumlah Produk</th>
                        <th>Rata Rata Reting</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr class="even:bg-slate-100 odd:bg-white">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ Illuminate\Support\Str::limit($category->category_description, 40, '...') }}</td>
                            <td>{{ $category->total_product }}</td>
                            <td>{{ $category->average_rating ?? '0.0' }}</td>
                            <td class="flex justify-center items-center gap-x-1">
                                <a href="{{ route('adminpage.product.category.edit', ['id' => $category->id]) }}">
                                    <img src="https://img.icons8.com/material-rounded/24/FFFFFF/edit--v1.png"
                                        alt="Edit_Button"
                                        class="h-7 w-7 p-1 bg-green-500 rounded hover:scale-[1.1] transition-all">
                                </a>
                                <img src="https://img.icons8.com/material-sharp/24/FFFFFF/waste.png" alt="Edit_Button"
                                    class="h-7 w-7 p-1 bg-red-500 rounded hover:scale-[1.1] transition-all cursor-pointer"
                                    wire:click="delete({{ $category->id }})">
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="flex items-center justify-center">
            {{ $categories->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
