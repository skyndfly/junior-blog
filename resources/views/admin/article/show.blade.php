@php
    use App\Service\Admin\Article\Show\Dto as ArticleShowDto;
    /** @var ArticleShowDto $article */

@endphp

@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl text-gray-500 mb-4">{{$article->title}}</h1>
    <div class="">{!! $article->description !!}</div>
    <h1 class="text-2xl text-gray-500 mb-4">{{$article->slug}}</h1>



@endsection
