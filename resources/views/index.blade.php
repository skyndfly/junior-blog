@php
    use App\Repository\Article\ShowMainArticle\Dto as ArticleDto;
    /** @var ArticleDto $article */
@endphp
@extends('layouts.app')
@section('content')
    <div class="card ">
        <div class="flex  items-center gap-6 mb-3">
            <a href="" title="Все записи автора"
               class="flex gap-1 items-center text-gray-500 text-base hover:text-purple-800">
                <i class="fa-solid fa-user"></i>
                admin
            </a>
            <div class="statistic flex gap-1 items-center text-gray-500 text-sm">
                <i class="fa-solid fa-eye"></i>
                {{$article->created_at}}
            </div>
        </div>
        <a href="" title="Открыть запись" class="text-4xl  hover:text-purple-800">
            {{$article->title}}
        </a>
        <img class="py-2" src="{{ asset('storage/' . $article->mainImage) }}" alt="">
        <p class="text-justify mb-3">
            {!! $article->shortDescription!!}
        </p>
        <a href="{{route('article.show', $article->slug)}}" class="group mt-3 font-bold hover:text-purple-800" title="Открыть запись">
            Читать полностью
            <i class="fa-solid fa-arrow-right group-hover:translate-x-2"></i>
        </a>
    </div>
@endsection


