@php
    use App\Service\Admin\Article\Show\Dto as ArticleShowDto;
    /** @var ArticleShowDto $article */

@endphp
@extends('layouts.app')
@section('title', $article->title)


@section('content')
    <div class="border-2 border-slate-300 p-2 rounded-md">
        <img class="block mx-auto" src="{{asset('storage/' . $article->mainImage)}}" alt="{{$article->title}}">
        <h1 class="text-2xl text-gray-500 my-4 indent-2">{{$article->title}}</h1>
        <div class="ck-content px-2">{!! $article->description !!}</div>
    </div>



@endsection
