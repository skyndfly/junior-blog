<div class="w-full">
    <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">Категория</label>
    <div class="mt-2">
        <div
            class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 "
        >
            <select
                name="{{$name}}"
                id="{{$name}}"
                class="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
            >
                <option value="">Нет</option>
                @if(!empty($categories))
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{str_repeat('- ', $cat->level)}}{{$cat->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
