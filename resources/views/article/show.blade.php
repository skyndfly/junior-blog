@php
    use App\Service\Admin\Article\Show\Dto as ArticleShowDto;
    /** @var ArticleShowDto $article */

@endphp
@extends('layouts.app')
@section('title', $article->title)


@section('content')
    <div class="px-2 py-4 mt-4">
        <div class="container mx-auto ">
            <div class="bg-white rounded-md border-2 border-gray-300">
                <img class="block mx-auto" src="{{asset('storage/' . $article->mainImage)}}" alt="{{$article->title}}">
                <h1 class="text-2xl text-gray-500 my-4 indent-2">{{$article->title}}</h1>
                <div class="ck-content px-2">{!! $article->description !!}</div>
            </div>
        </div>

    </div>
    <div class="px-2 py-4 bg-white">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold mb-4">Похожие статьи</h2>
        </div>
    </div>
    <div class="px-2 py-4">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold mb-4">Комментарии - 4</h2>
            <form action="">
                <p class="font-bold text-purple-950">Оставить комментарий</p>
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
                    <label for="message" class="block text-sm font-medium leading-6 text-gray-900">
                        Комментарий
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2">
                        <div
                            class="rounded-md shadow-sm ring-1 ring-inset  bg-white ring-purple-800 focus-within:ring-1 focus-within:ring-inset focus-within:ring-purple-700 "
                        >
                            <textarea
                                   name="message"
                                   id="message"
                                   class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            ></textarea>

                        </div>
                        <div class="text-red-500">
                            @error('message')
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
        </div>
    </div>

@endsection
