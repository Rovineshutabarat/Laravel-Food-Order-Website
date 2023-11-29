@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Tambah Produk</h1>
        <form method="POST" wire:submit.prevent="store" class="flex flex-col p-10 py-5 bg-white rounded-lg shadow gap-y-2">
            @csrf
            <label class="label">Nama Produk</label>
            <input type="text" name="name" wire:model="name" placeholder="Masukkan Nama Produk"
                class="input input-bordered">
            <label class="label">Harga Produk</label>
            <input type="number" name="price" wire:model="price" placeholder="Masukkan Harga Produk"
                class="input input-bordered">
            <label class="label">Kategori Produk</label>
            <select name="category_id" wire:model="category_id" class="select select-bordered">
                @foreach ($categories as $index => $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <label class="label">Deskripsi Produk</label>
            <textarea name="description" wire:model='description' placeholder="Masukkan Deskripsi Produk"
                class="textarea textarea-bordered textarea-lg"></textarea>
            <label class="label">Gambar Produk</label>
            <input type="file" name="image" wire:model="image" class="file-input file-input-bordered">

            <div class="flex items-center my-3 gap-x-3">
                <button type="submit" class="btn btn-sm btn-neutral" wire:click="store">Simpan</button>
                <button class="btn btn-sm btn-accent" wire:click="cancel">Batal</button>
            </div>
            @if ($image)
                <a href="{{ $image->temporaryUrl() }}"
                    class="w-40 h-32 rounded-lg mt-2 tooltip  border-black "
                    data-tip="Click To Preview Image">
                    <img src="{{ $image->temporaryUrl() }}" alt="" class="object-cover w-40 h-32 rounded-lg">
                </a>
            @endif
        </form>
    </div>

    <script>
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
    </script>
@endsection
