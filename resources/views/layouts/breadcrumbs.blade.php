<section class="flex justify-between pt-8 py-4 border-b-2 border-gray-300">
    <div class="flex gap-1 text-sm">
        <span class="font-bold">
            Главная
        </span>
        <span class="font-bold">
            /
        </span>
        <a href="">
            Название статьи
        </a>
    </div>
    <div>
        @if (Route::has('login'))
            <nav class="flex gap-1">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="text-sm hover:text-purple-800"
                    >
                        Профиль
                    </a>
                @else
                    <a
                    href="{{ route('login') }}"
                    class="font-bold text-sm hover:text-purple-800"
                    >
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Войти
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="text-sm hover:text-purple-800"
                        >
                            Присоедениться
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</section>

