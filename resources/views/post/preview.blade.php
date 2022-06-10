
<x-app-layout>
    <x-slot name="header">
        @if (isset($is_preview))
            <p>※これはプレビュー表示です</p>
        @endif
    </x-slot>
        <h1>件名</h1>
        <h2>{{ $post->title }}</h2>
        <h1>本文</h1>
        <div>{!! nl2br(e($post->body)) !!}</div>
</x-app-layout>