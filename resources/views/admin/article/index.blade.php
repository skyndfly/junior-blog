@php
    use App\Repository\Admin\Article\GetAll\Dto;
    use App\Models\Article;
    /** @var Dto[] $articles */
@endphp

@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl text-gray-500 mb-4">Список записей</h1>
    <a href="{{route('admin.article.create')}}"
       class="inline-block mb-4 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
        Добавить запись
    </a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    Имя
                </th>
                <th scope="col" class="px-6 py-3">
                    Короткое описание
                </th>
                <th scope="col" class="px-6 py-3">
                    Категория
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус
                </th>
                <th scope="col" class="px-6 py-3">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $item)
                <tr class="bg-white d border-b-[1px]">

                    <td class="px-6 py-4">
                        {{$item->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->shortDescription}}
                    </td>
                    <td class="px-6 py-4">

                        {{$item->category}}

                    </td>
                    <td class="px-6 py-4">
                        @if($item->status === Article::STATUS_PUBLISHED)
                            <span
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Активна</span>
                        @elseif($item->status === Article::STATUS_UNPUBLISHED)
                            <span
                                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Отключена</span>
                        @elseif($item->status === Article::STATUS_DRAFT)
                            <span
                                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-red-600/20">Черновик</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('admin.article.show', $item->slug)}}"
                           class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Просмотр
                        </a>
                        <button type="button"
                                class="text-yellow-600 hover:text-white border border-yellow-600 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                            Редактировать
                        </button>
                        <button type="button"
                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Удалить
                        </button>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{--        {{$articles->links('vendor.pagination.tailwind')}}--}}
    </div>

@endsection
