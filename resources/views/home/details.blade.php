@extends('layouts.index')
@section('title', 'Details Page')
@section('content')
    <div class="container mx-auto my-4">
        <div>
            <div class="h-[480px] ">
                <img class="w-full object-center object-cover h-full" src="{{ asset("/storage/uploads/{$post->image}") }}"
                    alt="">
            </div>
            <div class="flex items-center justify-center gap-4">
                <p class="text-center my-4 text-[24px] underline">
                    {{ $post->title }}
                </p>
                <p>
                    Like : {{$likeCount}}
                </p>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <p class="text-[19px] font-semibold">
                    {{ $post->description }}
                </p>
                <div>
                    @error('error')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                    <form action="{{route("post.like",["post"=>$post->id])}}" method="POST">
                        @csrf
                        <button class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400" type="submit">Like</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- comments --}}
        <div>
            <ul>
                @foreach ($comments as $comm)
                    <li class="rounded-lg border p-2 w-[240px] my-2">
                        <p>{{ $comm->user->name }} {{ $comm->user->surname }}</p>
                        {{ $comm->comment }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-[30%] mx-auto my-3">
            @if ($message = session('success'))
                <div class="text-green-500 my-5">
                    {{ $message }}
                </div>
            @endif
            @auth
                <form action="{{ route('comment.add') }}" method="POST">
                    @csrf
                    <div class="flex w-full gap-3 items-center">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <label class="block w-full my-4">
                            <span class="block text-sm font-medium text-slate-700 text-center">Name</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="name" placeholder="Name" disabled value="{{ auth()->user()->name }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
invalid:border-pink-500 invalid:text-pink-600
focus:invalid:border-pink-500 focus:invalid:ring-pink-500 
" />
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="w-full block">
                            <span class="block text-sm font-medium text-slate-700 text-center">Surname</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="surname" placeholder="Surname" disabled
                                value="{{ auth()->user()->surname }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
invalid:border-pink-500 invalid:text-pink-600
focus:invalid:border-pink-500 focus:invalid:ring-pink-500
" />
                            @error('surname')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </label>

                    </div>
                    <label class="w-full block">
                        <span class="block text-sm font-medium text-slate-700 text-center">Comment</span>
                        <!-- Using form state modifiers, the classes can be identical for every input -->
                        <textarea type="text" name="comment" placeholder="Comment"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                      "></textarea>
                        @error('comment')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </label>
                    <button
                        class="rounded block w-full bg-blue-500 my-4 p-3 text-[#fff] hover:bg-green-500 hover:text-[#fff] transition"
                        type="submit">Add</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
