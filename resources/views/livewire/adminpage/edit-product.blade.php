@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Edit Produk</h1>
        <div class="flex flex-col p-10 py-5 bg-white rounded-lg shadow gap-y-2" wire:key="{{ $productID }}">
            <label class="label">Nama Produk</label>
            <input type="text" name="name" wire:model="name" value="{{ $name }}" placeholder="Masukkan Nama Produk"
                class="input input-bordered">
            <label class="label">Harga Produk</label>
            <input type="number" name="price" wire:model="price" value="{{ $price }}"
                placeholder="Masukkan Harga Produk" class="input input-bordered">
            <label class="label">Kategori Produk</label>
            <select name="category_id" wire:model="category_id" class="select select-bordered">
                @foreach ($categories as $index => $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <label class="label">Deskripsi Produk</label>
            <input name="description" wire:model='description' value="{{ $description }}"
                placeholder="Masukkan Deskripsi Produk" class="textarea textarea-bordered textarea-lg py-16" />
            <label class="label">Gambar Produk</label>
            <input type="file" name="image" wire:model="image" value="{{ $image }}"
                class="file-input file-input-bordered">
            <div class="flex items-center my-3 gap-x-3">
                <button type="submit" class="btn btn-sm btn-neutral" wire:click="store">Simpan</button>
                <button class="btn btn-sm btn-error text-white" wire:click='resetForm'>Batal</button>
            </div>
            @if ($image)
                <a href="{{ $image->temporaryUrl() }}" class="w-40 h-32 rounded-lg mt-2 tooltip  border-black "
                    data-tip="Click To Preview Image">
                    <img src="{{ $image->temporaryUrl() }}" alt="" class="object-cover w-40 h-32 rounded-lg">
                </a>
            @endif
        </div>
    </div>
@endsection
