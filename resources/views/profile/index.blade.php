@extends('layouts.index')

@section('title', 'Profile')
@section('content')
    <div class="container mx-auto ">

        <div class="w-[60%] mx-auto  my-[50px] flex items-center justify-content-center flex-col">
            @if ($message = session('success'))
                <div class="text-green-500 my-5">
                    {{ $message }}
                </div>
            @endif
            <div class="flex mx-auto items-center justify-content-center gap-4">
                <div class="rounded-full border w-[80px] h-[80px] overflow-hidden">
                    <img class="w-full h-full object-cover"
                        src="{{ asset("/storage/uploads/profile/{$user->profile_image}") }}" alt="">
                </div>
                <div class="text-center">
                    <p>Xoş gəldiz
                        <span class="text-sky-400 font-medium font-sans underline">
                            {{ $user->name }}
                            {{ $user->surname }}
                        </span>
                    </p>
                    <form class="flex items-center justify-content-between gap-2" action="{{ route('profile.photo') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <label
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm"
                            for="image">
                            Şəkil yükə
                            <input id="image" style="display: none" type="file" name="image"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-pink-500 invalid:text-pink-600
                focus:invalid:border-pink-500 focus:invalid:ring-pink-500 ">
                        </label>
                        <button
                            class="mt-1 block w-full px-3 py-2 bg-white border border-green-300 rounded-md text-sm shadow-sm"
                            type="submit">Dəyiş</button>

                    </form>
                    @error('image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="my-[25px]">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="flex w-full gap-3 items-center">
                        <input type="hidden" name="post_id" ">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <label class="block w-full my-4">
                                                        <span class="block text-sm font-medium text-slate-700 text-center">Name</span>
                                                        <input type="text" name="name" placeholder="Name" value="{{ auth()->user()->name }}"
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
                                                        <input type="text" name="surname" placeholder="Surname"
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
                                                <div class="flex items-center justify-content-center gap-3">
                                                    <label class="w-full block">
                                                        <span class="block text-sm font-medium text-slate-700 text-center">Email</span>
                                                        <!-- Using form state modifiers, the classes can be identical for every input -->
                                                        <input value="{{ auth()->user()->email }}" type="text" name="email" placeholder="Email"
                                                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                      "/>
                                                        @error('email')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
                                                    </label>
                                                    <label class="w-full block">
                                                        <span class="block text-sm font-medium text-slate-700 text-center">Password</span>
                                                        <!-- Using form state modifiers, the classes can be identical for every input -->
                                                        <input type="text" name="password" placeholder="Password"
                                                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                      "/>
                                                        @error('password')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
                                                    </label>
                                                </div>
                                                <button
                                                    class="rounded block w-full bg-blue-500 my-4 p-3 text-[#fff] hover:bg-green-500 hover:text-[#fff] transition"
                                                    type="submit">Dəyiş</button>
                                            </form>
                                         </div>
                                        </div>

                                    </div>
@endsection
