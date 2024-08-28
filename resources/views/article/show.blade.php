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
            <h2 class="text-2xl font-bold mb-4" id="comments">Комментарии - 4</h2>
            @if(auth()->guest())
                @include('article.guest-comment-form', ['id' => $article->id])
            @else
                @include('article.auth-comment-form', ['id' => $article->id])
            @endif
        </div>
    </div>

@endsection
