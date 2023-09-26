<header class="flex justify-between h-20 border items-center container mx-auto px-2">
    <div class="cursor-pointer text-[18px]">
        Logo
    </div>
    <nav>
        <ul class="flex gap-[10px]">
            <li>
                <a class="{{ request()->routeIs('new') ? 'active' : '' }} font-semibold relative transition-colors overflow-hidden text-gray-700 hover:text-black hover:border-solid"
                    href="{{route("home")}}">
                    Home
                </a>
            </li>
            {{-- <li>
                <a class="{{ request()->routeIs('posts') ? 'active' : '' }} font-semibold relative transition-colors overflow-hidden text-gray-700 hover:text-black hover:border-solid"
                    href="">Posts</a>
            </li> --}}
            <li>
                <a class=" font-semibold relative transition-colors overflow-hidden text-gray-700 hover:text-black hover:border-solid {{ request()->routeIs('new') ? 'text-[#000]' : '' }}"
                    style="height: " href="{{ route('new') }}">New</a>
            </li>
        </ul>
    </nav>
    @guest
        <div>
            <a class="bg-green-500 hover:bg-blue-600 p-3" href="{{ route('login') }}">Login</a>
            <a class="bg-blue-500 hover:bg-blue-600 p-3" href="{{ route('register.page') }}">Register</a>
        </div>
    @endguest
    @auth
        <div class="flex items-center gap-2">
            <a class="rounded bg-green-500 hover:bg-blue-600 p-3" href="{{ route('profile') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="rounded bg-blue-500 hover:bg-blue-600 p-3" type="submit">Log Out</button>
            </form>
        </div>
    @endauth
</header>
