@extends('livewire.adminpage.adminpage')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('adminpage')
    <div class="flex flex-col mt-5">
        <h1 class="mb-5 ml-5 text-2xl font-medium">Statistik Penjualan</h1>
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-4 gap-x-8">
                <div
                    class="flex flex-col justify-center p-5 bg-white rounded-lg shadow hover:scale-[1.07] transition-all cursor-pointer">
                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/visible--v1.png" alt=""
                        class="p-[7px] w-9 h-9 mt-1 rounded-full bg-slate-500">
                    <h1 class="mt-3 mb-1 text-2xl font-medium">3.456k</h1>
                    <div class="flex text-[14px] text-slate-500 justify-between items-center mb-1 gap-x-8">
                        <h1>Total Pengunjung</h1>
                        <h2 class="text-blue-500">+0.40%</h2>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center p-5 bg-white rounded-lg shadow hover:scale-[1.07] transition-all cursor-pointer">
                    <img src="https://img.icons8.com/ios-filled/50/FFFFFF/receive-euro.png" alt=""
                        class="p-[7px] w-9 h-9 mt-1 rounded-full bg-slate-500">
                    <h1 class="mt-3 mb-1 text-2xl font-medium">Rp.200k</h1>
                    <div class="flex text-[14px] text-slate-500 justify-between items-center mb-1 gap-x-8">
                        <h1>Total Pemasukan</h1>
                        <h2 class="text-blue-500">+0.40%</h2>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center p-5 bg-white rounded-lg shadow hover:scale-[1.07] transition-all cursor-pointer">
                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/product.png" alt=""
                        class="p-[7px] w-9 h-9 mt-1 rounded-full bg-slate-500">
                    <h1 class="mt-3 mb-1 text-2xl font-medium">252</h1>
                    <div class="flex text-[14px] text-slate-500 justify-between items-center mb-1 gap-x-8">
                        <h1>Total Produk</h1>
                        <h2 class="text-blue-500">+0.40%</h2>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center p-5 bg-white rounded-lg shadow hover:scale-[1.07] transition-all cursor-pointer">
                    <img src="https://img.icons8.com/ios-filled/50/FFFFFF/user.png" alt=""
                        class="p-[7px] w-9 h-9 mt-1 rounded-full bg-slate-500">
                    <h1 class="mt-3 mb-1 text-2xl font-medium">123</h1>
                    <div class="flex text-[14px] text-slate-500 justify-between items-center mb-1 gap-x-8">
                        <h1>Total Pengguna</h1>
                        <h2 class="text-blue-500">+0.40%</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-10 gap-x-10">
        <div class="p-5 bg-white rounded-lg shadow">
            {!! $areaChart->container() !!}
        </div>
        <div class="p-5 py-20 bg-white rounded-lg shadow">
            {!! $donutChart->container() !!}
        </div>
    </div>


    <script src="{{ $areaChart->cdn() }}"></script>
    {{ $areaChart->script() }}
    <script src="{{ $donutChart->cdn() }}"></script>
    {{ $donutChart->script() }}
@endsection
