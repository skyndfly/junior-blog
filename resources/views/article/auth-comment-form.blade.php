@php
    /** @var int $id */
@endphp

@vite('resources/js/react/addCommentsAuth/app.tsx')
<div id="app" data-id="{{ $id }}" data-name="{{auth()->user()->name}}"></div>
