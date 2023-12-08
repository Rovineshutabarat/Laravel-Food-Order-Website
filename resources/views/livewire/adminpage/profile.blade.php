@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex justify-center gap-x-5 mx-20 mt-16 rounded">
        <div class="flex flex-col items-center bg-white shadow py-7 p-10">
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="" class="h-32 w-32 object-cover rounded-full">
            @else
                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" alt=""
                    class="h-32 w-32 object-cover rounded-full">
            @endif
            @if ($isEdit)
                <input type="file" class="file-input file-input-sm file-input-bordered w-28 mt-1" wire:model='image'>
            @endif
            <div class="flex justify-start pl-7 items-center gap-x-1 mt-7 btn btn-sm w-32" wire:click='showProfile'>
                <img src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="" class="h-5 w-5">
                <h1>Profile</h1>
            </div>

            @if ((int) $userID === (int) Auth::user()->id)
                <div class="flex justify-start pl-7 items-center gap-x-1 mt-4 btn btn-sm w-32" wire:click='setIsEdit'>
                    <img src="https://img.icons8.com/material/24/pencil--v1.png" alt="" class="h-5 w-5">
                    <h1>Edit</h1>
                </div>
                <a href="{{ route('auth.logout') }}"
                    class="flex justify-start pl-7 items-center gap-x-1 mt-4 btn btn-sm w-32">
                    <img src="https://img.icons8.com/ios-glyphs/30/shutdown--v1.png" alt="" class="h-5 w-5">
                    <h1>Logout</h1>
                </a>
            @endif


        </div>

        <div class="flex shadow flex-col bg-white px-16 p-7">

            @if ($isEdit)
                <input type="text" class="input input-bordered input-sm w-40" placeholder="Masukkan Nama Anda"
                    wire:model='username' value="{{ $username }}">
            @else
                <h1 class="text-[20px] font-semibold">{{ $user->username }}</h1>
            @endif

            <h1 class="text-[14px]">{{ $user->email }}</h1>
            <h1 class="text-[14px] my-2">Bergabung Pada {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-y') }}
            </h1>

            <div class="flex gap-x-10 my-10">
                @if ($isEdit)
                    <input type="text" class="input input-bordered input-sm w-40" placeholder="Masukkan Alamat Anda"
                        wire:model='address' value="{{ $address }}">
                @else
                    <div class="flex justify-center items-center gap-x-1">
                        <img src="https://img.icons8.com/ios-glyphs/30/4D4D4D/phone.png" alt="" class="h-5 w-5">
                        <h1>{{ $user->address ?? 'Belum Di Setel' }}</h1>
                    </div>
                @endif

                @if ($isEdit)
                    <input type="text" class="input input-bordered input-sm w-40" placeholder="Masukkan No Telepon Anda"
                        wire:model='phone_number' value="{{ $phone_number }}">
                @else
                    <div class="flex justify-center items-center gap-x-1">
                        <img src="https://img.icons8.com/ios-filled/50/4D4D4D/marker.png" alt="" class="h-5 w-5">
                        <h1>{{ $user->phone_number ?? 'Belum Di Setel' }}</h1>
                    </div>
                @endif

            </div>

            <div class="mt-5 flex items-center gap-x-5">
                <div class="flex flex-col items-center font-semibold">
                    <h1>{{ $total_review }}</h1>
                    <h1>Total Ulasan</h1>
                </div>
                <div class="flex flex-col items-center font-semibold">
                    <h1>{{ $total_order }}</h1>
                    <h1>Total Pesanan</h1>
                </div>
                <div class="flex flex-col items-center font-semibold">
                    <h1>{{ $completed_order }}</h1>
                    <h1>Pesanan Selesai</h1>
                </div>
            </div>
            @if ($isEdit)
                <div class="flex items-center gap-x-2">
                    <button class="btn bg-slate-600 btn-sm px-5 my-3 text-white" wire:click='store'>Simpan</button>
                    <button class="btn bg-red-500 btn-sm px-5 my-3 text-white" wire:click='cancel'>Batal</button>
                </div>
            @endif
        </div>
    </div>
@endsection
