
@php
    use App\Service\Article\NewsList\Handler;
    use App\Service\Article\NewsList\Dto;
    /** @var Dto[] $articles */
    $articles = Handler::handle()->getItems();
@endphp
<h4>Последние записи</h4>
<ul role="list" class="divide-y divide-gray-100">
    @foreach($articles as $item)
        <li class="flex justify-between gap-x-6 py-5">
            <a href="" class="flex min-w-0 gap-x-4 ">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900 hover:text-purple-800">{{$item->title}}</p>
                    <p class="mt-1 border-full text-xs leading-5 text-gray-500 hover:text-purple-800">
                        {{$item->shortDescription}}
                    </p>
                </div>
            </a>
        </li>
    @endforeach
</ul>
