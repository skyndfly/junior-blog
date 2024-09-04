@php
    /** @var int $id */
@endphp

@vite('resources/js/react/addCommentsAuth/app.tsx')
<div id="app" data-id="{{ $id }}" data-user-id="{{auth()->user()->id}}"></div>
