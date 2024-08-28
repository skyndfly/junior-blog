@php
/** @var int $id */
@endphp
<form action="{{route('comments.store.guest')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <p class="font-bold text-purple-950">Оставить комментарий</p>
    <span class="text-xs text-red-500">для неавторизованных пользователей, комментарии отображаются после модерации</span>
    <div class="w-[350px]">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
            Email
            <span class="text-red-500">*</span>
        </label>

        <div class="mt-2">
            <div
                class="rounded-md shadow-sm ring-1 ring-inset  bg-white ring-purple-800 focus-within:ring-1 focus-within:ring-inset focus-within:ring-purple-700 "
            >
                <input type="text"
                       name="email"
                       id="email"
                       autocomplete="email"
                       value="{{old('title')}}"
                       class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                >

            </div>
            <div class="text-red-500">
                @error('title')
                {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <div class="w-[550px]">
        <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">
            Комментарий
            <span class="text-red-500">*</span>
        </label>
        <div class="mt-2">
            <div
                class="rounded-md shadow-sm ring-1 ring-inset  bg-white ring-purple-800 focus-within:ring-1 focus-within:ring-inset focus-within:ring-purple-700 "
            >
                            <textarea
                                name="comment"
                                id="comment"
                                class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            ></textarea>

            </div>
            <div class="text-red-500">
                @error('comment')
                {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <button type="submit"
            class="bg-purple-950 hover:bg-purple-700 text-white font-bold py-2 px-4 mt-2 rounded w-[200px]">
        Отправить
    </button>
</form>
