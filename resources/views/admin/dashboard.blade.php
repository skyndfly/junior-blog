<?php
/** @var int $count */
?>
@extends('admin.app')

@section('content')
    <section class="p-4">
        Количество посетителей <br>
        Новых комментариев <br>
        Статьи на модерации<br>

        <div class=" py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                        <dt class="text-base leading-7 text-gray-600">Всего пользователей</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $count }}</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base leading-7 text-gray-600">Assets under holding</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">$119 trillion</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base leading-7 text-gray-600">New users annually</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
                </div>
            </dl>
        </div>
    </div>
</section>
@endsection


