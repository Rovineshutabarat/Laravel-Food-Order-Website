<nav class="flex justify-between items-center fixed top-0 w-full bg-base-100 p-3 px-5">

    <div class="flex">
        <a href="{{ route('homepage') }}" class="btn btn-ghost text-xl">Prooked</a>
    </div>

    <ul class="flex justify-center items-center gap-x-7">
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>
    </ul>

    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component"
                    src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
            </div>
        </div>
        <ul class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
            <li>
                <a class="justify-between">
                    Profile
                </a>
            </li>
            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
        </ul>
    </div>

</nav>
