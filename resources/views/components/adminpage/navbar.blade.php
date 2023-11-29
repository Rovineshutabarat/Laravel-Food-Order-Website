<div class="flex">
    <div class="fixed h-full bg-white rounded shadow-xl w-72 z-[999]">
        <div class="flex items-center mb-3 ml-12 mt-7 gap-x-2">
            <img src="https://img.icons8.com/ios/50/jira.png" alt="" class="h-9">
            <h1 class="text-2xl font-medium uppercase">Prooked</h1>
        </div>
        <div class="flex flex-col text-[15px]">
            <h1 class="text-[13px] my-3 mb-1 pl-10">Menu</h1>
            <a href="{{ route('adminpage.dashboard') }}"
                class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                <img src="https://img.icons8.com/material-rounded/24/4D4D4D/home.png" alt="" class="h-5">
                <h1>Dashboard</h1>
            </a>
            <div x-data="{ showProductMenu: false }">
                <div @click="showProductMenu = !showProductMenu"
                    class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                    <img src="https://img.icons8.com/ios-glyphs/30/4D4D4D/product.png" alt="" class="h-5">
                    <div class="flex items-center justify-between w-full cursor-pointer">
                        <h1>Products</h1>
                        <img src="https://img.icons8.com/ios/50/4D4D4D/expand-arrow.png" alt="" class="h-4 mr-5"
                            x-bind:class="{ 'rotate-180': showProductMenu }">
                    </div>
                </div>
                <div class="pl-10 py-1 flex-col gap-y-1 text-[14px]" x-show="showProductMenu">
                    <a href="{{ route('adminpage.product') }}"
                        class="flex items-center py-1 pl-6 rounded-l gap-x-2 hover:bg-slate-100 hover:border-l-blue-500 hover:border-l-2">
                        <img src="https://img.icons8.com/material-rounded/24/4D4D4D/full-stop.png" alt=""
                            class="h-3">
                        <h1>Product List</h1>
                    </a>
                    <a href="{{ route('adminpage.add.product') }}"
                        class="flex items-center py-1 pl-6 rounded-l gap-x-2 hover:bg-slate-100 hover:border-l-blue-500 hover:border-l-2">
                        <img src="https://img.icons8.com/material-rounded/24/4D4D4D/full-stop.png" alt=""
                            class="h-3">
                        <h1>Add Product</h1>
                    </a>
                    <div
                        class="flex items-center py-1 pl-6 rounded-l gap-x-2 hover:bg-slate-100 hover:border-l-blue-500 hover:border-l-2">
                        <img src="https://img.icons8.com/material-rounded/24/4D4D4D/full-stop.png" alt=""
                            class="h-3">
                        <h1>Product Category</h1>
                    </div>
                </div>
            </div>
            <div
                class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                <img src="https://img.icons8.com/sf-black/64/4D4D4D/refund-2.png" alt="" class="h-5">
                <h1>Transaction</h1>
            </div>
            <div
                class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                <img src="https://img.icons8.com/ios-glyphs/30/4D4D4D/group-foreground-selected.png" alt=""
                    class="h-5">
                <h1>User</h1>
            </div>
            <div
                class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                <img src="https://img.icons8.com/ios-filled/50/4D4D4D/user.png" alt="" class="h-5">
                <h1>Account</h1>
            </div>
            <div
                class="flex items-center py-3 pl-10 transition-all hover:border-l-4 gap-x-[10px] hover:bg-slate-100 hover:border-l-blue-500">
                <img src="https://img.icons8.com/external-bartama-glyph-64-bartama-graphic/64/4D4D4D/external-off-miscellaneous-elements-glyph-bartama-glyph-64-bartama-graphic.png"
                    alt="" class="h-5">
                <h1>Logout</h1>
            </div>
        </div>
    </div>
    <div class="w-full p-4 bg-white shadow-sm ml-72">
        <div class="flex items-center justify-between mx-3">
            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a>Dashboard</a></li>
                    <li><a>Documents</a></li>
                    <li>Add Document</li>
                </ul>
            </div>
            <div class="flex items-center justify-center">
                <div class="flex items-center justify-center gap-x-[5px]">
                    <h1>Rovines Hutabarat</h1>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="rounded-full w-9">
                                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </label>
                        <ul tabindex="0"
                            class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                            <li>
                                <a class="justify-between">
                                    Profile
                                    <span class="badge">New</span>
                                </a>
                            </li>
                            <li><a>Settings</a></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
