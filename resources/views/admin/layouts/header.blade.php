<header class="flex items-center justify-between px-4 bg-white h-[76px]">
    <div class="relative mt-2 rounded-md shadow-sm">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <span class="text-gray-500 sm:text-sm">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
        </div>
        <input type="text" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Поиск...">

    </div>
    <div class="right flex items-center gap-4">
        <button>
            <i class="fa-solid fa-bell text-gray-500"></i>
        </button>
        <span class="text-gray-300">|</span>
        <span class="flex items-center gap-4 text-gray-500">
            <img
                alt=""
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                class="rounded-full"
                width="32"
            >
            {{ Auth::user()->name }}
        </span>
        <span class="text-gray-300">|</span>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="text-gray-500">
                Выйти
            </button>
        </form>
    </div>

</header>
