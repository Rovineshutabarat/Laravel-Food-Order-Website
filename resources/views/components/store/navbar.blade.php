<nav class="flex justify-center items-center p-5 gap-x-32">
    <div class="flex justify-center items-center gap-x-1 text-[22px] font-medium">
        <img src="https://img.icons8.com/color/48/shopify.png" alt="" class="h-9 w-9">
        <h1>Prooked</h1>
    </div>

    <div class="flex items-center">
        <input type="text" placeholder="Search…" wire:model.live='search'
            class="input input-bordered w-80 input-sm rounded-l-lg rounded-r-none" />
        <img src="https://img.icons8.com/ios-filled/50/FFFFFF/search.png" alt=""
            class="w-8 h-8 p-2 bg-blue-500 rounded-r-lg">
    </div>

    <div class="flex justify-center items-center text-slate-600 gap-x-10 text-[13px] font-medium">

        <a href="{{ route('homepage') }}" wire:navigate class="flex flex-col items-center">
            <img src="https://img.icons8.com/windows/96/4D4D4D/home.png" alt="" class="h-6 w-6">
            <h1>Beranda</h1>
        </a>
        <a href="{{ route('store.product') }}" wire:navigate class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios/50/shop--v1.png" alt="" class="h-6 w-6">
            <h1>Belanja</h1>
        </a>

        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/fluency-systems-filled/48/4D4D4D/sorting-answers.png" alt=""
                class="h-6 w-6">
            <h1>Kategori</h1>
        </div>

        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/material-outlined/96/4D4D4D/filled-like.png" alt=""
                class="h-6 w-6">
            <h1>Whistlist</h1>
        </div>

        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios/50/4D4D4D/user-male-circle.png" alt="" class="h-6 w-6">
            <h1>Profile</h1>
        </div>
    </div>
</nav>
