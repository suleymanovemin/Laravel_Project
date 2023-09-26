@extends('layouts.index')
@section('title', 'Register')
@section('content')
    <div class="w-[30%] mx-auto my-[70px] ">
        <div class="my-[20px] text-center ">
            <h1 class="font-sans text-[26px] font-bold">Register</h1>
        </div>
        <form accept="{{ route('register') }}" method="POST">
            @csrf
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Name</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="text" name="name" placeholder="Name"
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
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Surname</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="text" name="surname" placeholder="Surname"
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
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Email</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="text" name="email" placeholder="Email"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
        invalid:border-pink-500 invalid:text-pink-600
        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
      " />
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Password</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="password" name="password" placeholder="Password"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
        invalid:border-pink-500 invalid:text-pink-600
        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
      " />
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Password veryfied</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input type="password" name="password_confirmation" placeholder="Password Confirmation"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
        invalid:border-pink-500 invalid:text-pink-600
        focus:invalid:border-pink-500 focus:invalid:ring-pink-500
      " />
                @error('password_confirmation')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </label>
            <button class="rounded block w-full bg-blue-500 my-4 p-3 text-[#fff] hover:bg-green-500 hover:text-[#fff] transition"
                type="submit">Register</button>
            <a href="{{ route('login') }}" class="text-[#000] text-sm font-medium underline">Login..</a>
        </form>
    </div>
@endsection
