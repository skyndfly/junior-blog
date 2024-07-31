<nav class="text-white h-[100vh]" style="background-color: #111827;">
    <h1 class="text-2xl text-center font-bold h-[76px] flex items-center justify-center">Junior-blog Panel</h1>
    <div class="px-4">
        <a href="" class="block w-full hover:bg-slate-500 p-2 rounded-md">
            <i class="fa-solid fa-chart-line"></i>
            Рабочий стол
        </a>
        <div class="menu_dropdown_item">
            <button
                class="menu_dropdown_button flex items-center justify-between w-full text-left hover:bg-slate-500 p-2 rounded-md cursor-pointer"
            >
                <span>
                    <i class="fa-solid fa-layer-group"></i>
                    Категории
                </span>
                <span class="chevron">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>

            </button>
            <div class="submenu hidden">
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-list"></i>
                    Список категорий
                </a>
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-plus"></i>
                    Добавить
                </a>
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-gears"></i>
                    Настройки
                </a>
            </div>
        </div>
        <div class="menu_dropdown_item">
            <button
                class="menu_dropdown_button flex items-center justify-between w-full text-left hover:bg-slate-500 p-2 rounded-md cursor-pointer"
            >
                <span>
                    <i class="fa-solid fa-message"></i>
                    Записи
                </span>
                <span class="chevron">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>

            </button>
            <div class="submenu hidden">
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-list"></i>
                    Список записей
                </a>
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-plus"></i>
                    Добавить
                </a>
                <a href="" class="block w-full  py-2 ps-8 rounded-md hover:bg-slate-500">
                    <i class="fa-solid fa-gears"></i>
                    Настройки
                </a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let btns = document.querySelectorAll('.menu_dropdown_button');
            btns.forEach(button => {
                button.addEventListener('click', function () {
                    const parent = this.parentElement;
                    const submenu = parent.querySelector('.submenu');
                    const chevron = button.querySelector('.chevron i');
                    if (chevron){
                        chevron.classList.toggle('fa-chevron-down');
                        chevron.classList.toggle('fa-chevron-up');
                    }

                    if (submenu) {
                        submenu.classList.toggle('hidden');
                    }
                });
            });
        });

        // function dropdown() {
        //     document.querySelector(".submenu").classList.toggle("hidden");
        //     document.querySelector("#arrow").classList.toggle("rotate-0");
        // }
        //
        // dropdown();
        //
        // function openSidebar() {
        //     document.querySelector(".sidebar").classList.toggle("hidden");
        // }
    </script>
</nav>
