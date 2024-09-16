@php
    /** @var int $id */
    $userId = !auth()->guest() ? auth()->user()->id : false;
@endphp

@vite('resources/js/react/addCommentsAuth/app.tsx')


<div id="app" data-id="{{ $id }}" data-user-id="{{$userId}}"></div>
