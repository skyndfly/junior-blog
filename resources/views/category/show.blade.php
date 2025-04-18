@php
    use Illuminate\Support\Carbon;
    /** @var \App\Models\Article $articles[] */
@endphp

@extends('layouts.app')
@section('title', 'Записи категории')


@section('content')
    <div class="px-2 py-4 mt-4">
        <div class="container mx-auto ">
            @foreach($articles as $article)

                <div class="bg-white rounded-md border-2 border-gray-300 px-2 py-2 mb-2">

                    <div class="statistic flex gap-1 items-center text-gray-500 text-sm">
                        <a href="" title="Все записи автора"
                           class="flex gap-1 items-center text-gray-500 text-base hover:text-purple-800">
                            <i class="fa-solid fa-user"></i>
                            admin
                        </a>
                        <i class="fa-solid fa-eye"></i>
                        {{Carbon::parse($article->created_at)->format('d-m-Y H:i')}}
                    </div>
                    <a href="{{route('article.show', $article->slug)}}" title="Открыть запись" class="text-2xl block mb-3 hover:text-purple-800">
                        {{$article->title}}
                    </a>
                    <p class="text-justify mb-3">
                        {!! $article->shortDescription!!}
                    </p>
                    <a href="{{route('article.show', $article->slug)}}"
                       class="group mt-3 font-bold hover:text-purple-800" title="Открыть запись">
                        Читать полностью
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-2"></i>
                    </a>
                </div>
            @endforeach
                {{$articles->links('vendor.pagination.tailwind')}}
        </div>

    </div>



@endsection
