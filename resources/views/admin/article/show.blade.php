@php
    use App\Repository\Article\Show\Dto as ArticleShowDto;
    /** @var ArticleShowDto $article */

@endphp

@extends('admin.layouts.app')

@section('content')
    <div class="border-2 border-slate-300 p-2 rounded-md bg-white">
        <img src="{{asset('storage/' . $article->mainImage)}}" alt="{{$article->title}}">
        <h1 class="text-2xl text-gray-500 my-4 indent-2">{{$article->title}}</h1>
        <div class="ck-content px-2">{!! $article->description !!}</div>
        <h1 class="text-2xl text-gray-500 mb-4">{{$article->slug}}</h1>
    </div>

@endsection
