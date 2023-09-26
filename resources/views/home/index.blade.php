@extends('layouts.index')
@section('title', 'Ana Səhifə')
@section('content')
    <div class="container mx-auto my-[50px] grid grid-cols-4 gap-4">
        @if ($posts)
            @foreach ($posts as $post)
                <div class="h-[280px] rounded my-3 ">
                    <div class="w-full h-full overflow-hidden">
                        <a href="{{ route('post.details', ['id' => $post->id]) }}"><img class="w-full h-full object-cover"
                                src='{{ asset("/storage/uploads/{$post->image}") }}'></a>
                    </div>
                    <div>
                        <a href="{{ route('post.details', ['id' => $post->id]) }}">
                            <h1 class="text-black-500 font-sans font-bold my-[5px] text-[19px]">{{ $post->title }}</h1>
                        </a>
                    </div>
                    <div>
                        <p>{{ $post->user->name }} {{ $post->user->surname }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h1>Yoxdur</h1>

        @endif
    </div>
@endsection
