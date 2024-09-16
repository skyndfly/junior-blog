@php
    use Illuminate\Support\Carbon;
    use App\Repository\Article\ShowMainArticle\Dto as ArticleDto;
    /** @var ArticleDto $article */
@endphp
@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-table gap-8 py-14">

            <div class="px-3">

                @if($article !== null)
                    <div class="card">
                        <div class="flex  items-center gap-6 mb-3">
                            <a href="" title="Все записи автора"
                               class="flex gap-1 items-center text-gray-500 text-base hover:text-purple-800">
                                <i class="fa-solid fa-user"></i>
                                admin
                            </a>
                            <div class="statistic flex gap-1 items-center text-gray-500 text-sm">
                                <i class="fa-solid fa-eye"></i>
                                {{Carbon::parse($article->created_at)->format('d-m-Y H:i')}}
                            </div>
                        </div>
                        <a href="{{route('article.show', $article->slug)}}" title="Открыть запись"
                           class="text-3xl  hover:text-purple-800">
                            {{$article->title}}
                        </a>
                        <img class="py-2" src="{{ asset('storage/' . $article->mainImage) }}" alt="">
                        <p class="text-justify mb-3">
                            {!! $article->shortDescription!!}
                        </p>
                        <a href="{{route('article.show', $article->slug)}}"
                           class="group mt-3 font-bold hover:text-purple-800" title="Открыть запись">
                            Читать полностью
                            <i class="fa-solid fa-arrow-right group-hover:translate-x-2"></i>
                        </a>
                    </div>
                @else
                    <h1>Пока нет записей!</h1>
                @endif
            </div>
            <section class="">
                @include('layouts.news-list')
            </section>
        </div>
    </div>
{{--    <div class="bg-white py-4 px-3">--}}
{{--        <div class="container mx-auto">--}}
{{--            <h2 class="text-2xl mb-4">Популярные категории</h2>--}}
{{--            <div class="categories grid grid-cols-category ">--}}
{{--                <div class="name flex flex-col gap-2">--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 1</span>--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 2</span>--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 3</span>--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 4</span>--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 5</span>--}}
{{--                    <span class="py-4 px-3 bg-purple-100 text-left">Категория 6</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @include('layouts.newsletter')--}}
@endsection


