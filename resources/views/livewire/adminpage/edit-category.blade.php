@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <h1 class="text-2xl font-medium">Edit Kategori</h1>
        <div class="flex flex-col p-10 py-5 bg-white rounded-lg shadow gap-y-2">
            @csrf
            <label class="label">Nama Kategori</label>
            <input type="text" name="name" wire:model="name" placeholder="Masukkan Nama Kategori"
                class="input input-bordered">
            <label class="label">Deskripsi Kategori</label>
            <input name="description" wire:model='description' placeholder="Masukkan Deskripsi Kategori"
                class="textarea textarea-bordered textarea-lg py-16" />

            <div class="flex items-center my-3 gap-x-3">
                <button class="btn btn-sm btn-neutral" wire:click='store'>Simpan</button>
                <button class="btn btn-sm btn-error text-white" wire:click="cancel">Batal</button>
            </div>
        </div>
    </div>
@endsection
