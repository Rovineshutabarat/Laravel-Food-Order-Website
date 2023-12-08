<div class="flex flex-col fixed top-0 w-full bg-white z-[9999]">

    <div class="flex justify-between items-center p-3 md:px-10 px-5">
        <div class="flex text-2xl font-semibold justify-center items-center gap-x-2">
            <img src="https://img.icons8.com/ios/50/jira.png" alt="Logo.png" class="h-9 w-9">
            <h1>Musafir Jaya</h1>
        </div>
        <div class="md:flex hidden justify-center items-center lg:gap-x-20 md:gap-x-7">
            <ul class="flex justify-center items-center lg:gap-x-10 md:gap-x-7 text-[15px] font-medium">
                <li><a href="{{ route('homepage') }}">Beranda</a></li>
                <li><a href="{{ route('store.product') }}">Produk</a></li>
                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                <li>Hubungi Kami</li>
            </ul>
            <div class="flex justify-center items-center gap-x-3">
                @auth
                    <div class="flex justify-center items-center gap-x-1">
                        <h1>{{ Auth::user()->username }}</h1>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS Navbar component"
                                        src="{{ asset('storage/' . Auth::user()->image) }}" />
                                </div>
                            </div>
                            <ul class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    @auth
                                        <a href="{{ route('store.profile', ['id' => Auth::user()->id]) }}">
                                            <h1>Profil</h1>
                                        </a>
                                    @else
                                        <a href="{{ route('auth.login') }}">
                                            <h1>Profil</h1>
                                        </a>
                                    @endauth
                                </li>
                                @if (Auth::check() && Auth::user()->role === 'superadmin')
                                    <li><a href="{{ route('adminpage.dashboard') }}">Admin Page</a></li>
                                @endif
                                <li><a href="{{ route('auth.logout') }}">Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a class="btn bg-transparent border-none btn-md" href="{{ route('auth.login') }}">Login</a>
                    <a class="btn btn-primary px-7 btn-md text-white" href="{{ route('auth.register') }}">Register</a>
                @endauth
            </div>
        </div>
        <div class="md:hidden" x-data="{ showSidebar: false }">
            <img src="https://img.icons8.com/ios-filled/50/menu--v6.png" alt="" class="h-7 w-7 cursor-pointer"
                @click="showSidebar = !showSidebar">
            <div class="fixed bg-slate-50 transition-all h-full shadow p-5 top-14 flex flex-col items-center w-72 z-[999] right-0"
                x-show="showSidebar">
                <ul class="flex flex-col items-center py-5 gap-y-7 text-[15px]">
                    <li><a href="{{ route('homepage') }}">Beranda</a></li>
                    <li><a href="{{ route('store.product') }}">Produk</a></li>
                    <li>Tentang Kami</li>
                    <li>Hubungi Kami</li>
                </ul>
            </div>
        </div>
    </div>
</div>
