@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5 mr-3 gap-y-5">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-medium">Daftar Pengguna</h1>
            <div class="flex items-center justify-center gap-x-3">
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
                        <th>Usernama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="even:bg-slate-100 odd:bg-white">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role ? $user->role : 'user' }}</td>
                            <td>{{ $user->phone_number ? $user->phone_number : '0000' }}</td>
                            <td class="flex justify-center items-center gap-x-1 tooltip" data-tip="Ubah Role">
                                <a href="{{ route('adminpage.profile', ['id' => $user->id]) }}">
                                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/visible--v1.png" alt="View_Button"
                                        class="h-7 w-7 p-1 bg-blue-500 rounded hover:scale-[1.1] tooltip transition-all cursor-pointer">
                                </a>
                                <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/admin-settings-male.png"
                                    alt="Edit_Button"
                                    class="h-7 w-7 p-1 bg-green-500 rounded hover:scale-[1.1] tooltip transition-all cursor-pointer"
                                    wire:click="setAdmin({{ $user->id }})">
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="flex items-center justify-center">
            {{ $users->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
