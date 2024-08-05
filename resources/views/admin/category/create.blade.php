<?php
/** @var \App\Service\Admin\Category\ShowForSelect\Dto\Dto $cat */
/** @var \App\Service\Admin\Category\ShowForSelect\Dto\CollectionDto $categories */

?>
@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl text-gray-500 mb-4">Добавить новую категорию</h1>
    <form action="{{route('admin.category.store')}}" method="post" class="bg-white p-4 flex flex-col gap-4 rounded-md">
        @csrf
        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Название
                    категории</label>
                <div class="mt-2">
                    <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="name" id="name" autocomplete="name"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                               placeholder="Linux">
                    </div>
                </div>
            </div>
        </div>
        <x-admin-form-category-select :categories="$categories->getItems()" name="parentId">
        </x-admin-form-category-select>
        <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" name="status" value="" class="sr-only peer">
            <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
            <span class="ms-3 text-sm font-medium text-gray-900 ">Активна?</span>
        </label>

        <button type="submit" class="bg-teal-600 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded w-[200px]">
            Создать
        </button>
    </form>
@endsection
