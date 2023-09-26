@extends('layouts.index')


@section('title', 'New Post')
@section('content')
    <div class="w-[30%] mx-auto my-[70px]">
        @if ($message = session("success"))
        <div class="text-green-500 my-5">
            {{ $message }}
        </div>
        @endif
        @if ($message = session("error"))
        <div class="text-red-500 my-5">
            {{ $message }}
        </div>
        @endif
        <form action="{{ route('post.new') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Title</span>
                <input type="text" name="title" placeholder="Title"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
            invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
          " />
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Description</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="text" name="description" placeholder="Description"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
            invalid:border-pink-500 invalid:text-pink-600
            focus:invalid:border-pink-500 focus:invalid:ring-pink-500
          " />
                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Owner</span>
                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                <input type="text" disabled
                    placeholder="{{ auth()->user()->name }} {{ auth()->user()->surname }}"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                         focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                         disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                         invalid:border-pink-500 invalid:text-pink-600
                         focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                       " />
                @error('owner')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Image</span>
                <input type="file" name="image"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                     focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                     disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                     invalid:border-pink-500 invalid:text-pink-600
                     focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                   " />
                @error('image')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <button
                class="rounded block w-full bg-blue-500 my-4 p-3 text-[#fff] hover:bg-green-500 hover:text-[#fff] transition"
                type="submit">Add</button>
        </form>
    </div>
@endsection
