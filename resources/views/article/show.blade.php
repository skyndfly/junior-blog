@php
    use App\Repository\Article\GetSimilar\Dto;
    use App\Repository\Article\Show\Dto as ArticleShowDto;
    /** @var ArticleShowDto $article */
    /** @var Dto[] $similarArticles */
@endphp

@extends('layouts.app')
@section('title', $article->title)


@section('content')
    <div class="px-2 py-4 mt-4">
        <div class="container mx-auto ">
            <div class="bg-white rounded-md border-2 border-gray-300">
                <div style="background-image: url({{asset('storage/' . $article->mainImage)}}); height: 50px;">

                </div>
                <h1 class="text-2xl text-gray-500 my-4 indent-2">{{$article->title}}</h1>
                <div class="ck-content px-2">{!! $article->description !!}</div>
            </div>
        </div>

    </div>

    @if(!empty($similarArticles))
        <div class="px-2 py-12 bg-white">
            <div class="container mx-auto ">
                <h2 class="text-2xl font-bold mb-4">Похожие статьи</h2>
                <div class="flex gap-6 flex-wrap xl:flex-nowrap	">
                    @foreach($similarArticles as $item)
                        <div
                            class="w-full xl:w-1/2 relative bg-white shadow-custom rounded-lg p-6 transform hover:scale-105 transition-transform duration-300"
                        >
                            <h4 class="text-xl font-bold mb-2">{{$item->title}}</h4>
                            <p class="mb-4">{{$item->shortDescription}}</p>
                            <a class="text-blue-500 absolute bottom-2 font-bold hover:underline " href="">Читать дальше...</a>
                            <div
                                style="background-image: url({{asset('storage/' . $item->mainImage)}})"
                                class="h-[5px] w-full absolute bottom-0 left-0"
                            ></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="px-2 py-4">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold mb-4" id="comments">Комментарии</h2>
            @include('article.comment', ['id' => $article->id])
        </div>
    </div>

@endsection
