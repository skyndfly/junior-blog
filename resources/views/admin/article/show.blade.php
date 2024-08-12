@php use App\Models\Article; @endphp

@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl text-gray-500 mb-4">{{$article->title}}</h1>
    <h1 class="text-2xl text-gray-500 mb-4">{{$article->description}}</h1>
    <h1 class="text-2xl text-gray-500 mb-4">{{$article->slug}}</h1>



@endsection
