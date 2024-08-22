@php
    use App\Service\Admin\Category\ShowForSelect\Dto\CollectionDto;use function Laravel\Prompts\error;
    /** @var CollectionDto $categories */
@endphp

@extends('admin.layouts.app')
@section('content')
    @if(empty($categories->getItems()))
        <x-admin-access-denied>
            <p>
                Прежде чем создавать запись, необходимо добавить категорию.
            </p>
            <a href="{{route('admin.category.create')}}" class="text-blue-700">
                Добавить категорию
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </x-admin-access-denied>
    @else
        <h1 class="text-2xl text-gray-500 mb-4">Добавить новую запись</h1>
        <form action="{{route('admin.article.store')}}" method="post"
              class="bg-white p-4 flex flex-col gap-4 rounded-md" enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Название</label>
                <div class="mt-2">
                    <div
                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
                    >
                        <input type="text"
                               name="title"
                               id="title"
                               autocomplete="name"
                               class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                               placeholder="Новая запись..."
                        >

                    </div>
                    <p class="text-sm my-2 text-teal-700">
                        Осталось символов: <span id="titleCharsCountDisplay">140</span>
                    </p>
                   <div class="text-red-500">
                       @error('title')
                       {{$message}}
                       @enderror
                   </div>
                </div>
            </div>
            <div class="w-full">
                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Ссылка</label>
                <div class="mt-2">
                    <div
                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
                    >
                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="Новая запись..."
                        >
                    </div>
                    <div class="text-red-500">
                        @error('slug')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Описание</label>
                <div class="mt-2">
                    <div
                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
                    >
                    <textarea
                        class="block w-full min-h-[500px] border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        name="description" id="description"
                    ></textarea>
                    </div>
                    <div class="text-red-500">
                        @error('description')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="shortDescription" class="block text-sm font-medium leading-6 text-gray-900">Короткое
                    описание</label>
                <div class="mt-2">
                    <div
                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
                    >
                        <input type="text" name="shortDescription" id="shortDescription" autocomplete="name"
                               class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                               placeholder="Новая запись...">
                    </div>
                    <p class="text-sm my-2 text-teal-700">
                        Осталось символов: <span id="shortDescriptionCharsCountDisplay">250</span>
                    </p>
                    <div class="text-red-500">
                        @error('shortDescription')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="mainImage" class="block text-sm font-medium leading-6 text-gray-900">Главное
                    изображение</label>
                <div class="mt-2">
                    <div
                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
                    >
                        <input type="file" name="mainImage" id="name" autocomplete="name"
                               class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                               placeholder="Новая запись...">
                    </div>
                    <div class="text-red-500">
                        @error('mainImage')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <x-admin-form-category-select :categories="$categories->getItems()" name="categoryId">
            </x-admin-form-category-select>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="status" value="" class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 ">Активна?</span>
            </label>

            <button type="submit"
                    class="bg-teal-600 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded w-[200px]">
                Создать
            </button>
        </form>
    @endif
@endsection
{{--@section('scripts')--}}
{{--    @vite('resources/js/admin/title-length.js')--}}
{{--    @vite('resources/js/admin/shortDescription-length.js')--}}
{{--    @vite('resources/js/admin/slug-transform.js')--}}
{{--@endsection--}}
