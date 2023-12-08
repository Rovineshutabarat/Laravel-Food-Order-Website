<nav class="flex justify-center items-center p-5 gap-x-32">
    <div class="flex justify-center items-center gap-x-1 text-[22px] font-medium">
        <img src="https://img.icons8.com/ios/50/jira.png" alt="" class="h-9 w-9">
        <h1>Prooked</h1>
    </div>

    <div class="flex items-center">
        <input type="text" placeholder="Search…" wire:model.live='search'
            class="input input-bordered w-80 input-sm rounded-l-lg rounded-r-none" />
        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/search.png" alt=""
            class="w-8 h-8 p-2 bg-primary rounded-r-lg">
    </div>

    <div class="flex justify-center items-center text-slate-600 gap-x-10 text-[13px] font-medium">

        <a href="{{ route('homepage') }}" wire:navigate class="flex flex-col items-center">
            <img src="https://img.icons8.com/windows/96/4D4D4D/home.png" alt="" class="h-6 w-6">
            <h1>Beranda</h1>
        </a>
        @auth
            <a href="{{ route('store.order') }}" wire:navigate class="flex flex-col items-center">
                <img src="https://img.icons8.com/ios/50/purchase-order.png" alt="" class="h-6 w-6">
                <h1>Pesanan</h1>
            </a>
        @else
            <a href="{{ route('auth.login') }}" wire:navigate class="flex flex-col items-center">
                <img src="https://img.icons8.com/ios/50/purchase-order.png" alt="" class="h-6 w-6">
                <h1>Pesanan</h1>
            </a>
        @endauth

        <div class="dropdown">
            <div tabindex="0" role="button" class="flex flex-col items-center">
                <img src="https://img.icons8.com/fluency-systems-filled/48/4D4D4D/sorting-answers.png" alt=""
                    class="h-6 w-6">
                <h1>Kategori</h1>
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] gap-y-1 menu shadow rounded w-52">
                <li wire:click="setCategory('')" class="cursor-pointer">Semua</li>
                <li wire:click="setCategory('Makanan')" class="cursor-pointer">Makanan</li>
                <li wire:click="setCategory('Minuman')" class="cursor-pointer">Minuman</li>
                <li wire:click="setCategory('cemilan')" class="cursor-pointer">Cemilan</li>
            </ul>
        </div>

        <div class="dropdown">
            <div tabindex="0" role="button" class="flex flex-col items-center">
                <img src="https://img.icons8.com/ios-glyphs/30/horizontal-settings-mixer--v1.png" alt=""
                    class="h-6 w-6">
                <h1>Filter</h1>
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu shadow gap-y-1 rounded w-52">
                <li wire:click="setFilter('')" class="cursor-pointer">Semua</li>
                <li wire:click="setFilter('rating')" class="cursor-pointer">Rating</li>
                <li wire:click="setFilter('harga')" class="cursor-pointer">Harga</li>
            </ul>
        </div>

        @auth
            <a href="{{ route('store.profile', ['id' => Auth::user()->id]) }}" class="flex flex-col items-center">
                <img src="https://img.icons8.com/ios/50/4D4D4D/user-male-circle.png" alt="" class="h-6 w-6">
                <h1>Profile</h1>
            </a>
        @else
            <a href="{{ route('auth.login') }}" class="flex flex-col items-center">
                <img src="https://img.icons8.com/ios/50/4D4D4D/user-male-circle.png" alt="" class="h-6 w-6">
                <h1>Profile</h1>
            </a>
        @endauth
    </div>
</nav>
