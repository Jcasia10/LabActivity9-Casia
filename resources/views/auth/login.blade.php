@extends('layouts.app')

@section('title', 'Sign in | Bakuna Tracker')

@section('content')
<div class="mx-auto mt-8 max-w-md">
    <div class="mb-6 text-center">
        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Health worker access</p>
        <h1 class="mt-2 text-3xl font-bold text-slate-900">Welcome back</h1>
        <p class="mt-2 text-slate-500">Sign in to manage the Purok Casia vaccination desk.</p>
    </div>
    <form method="POST" action="/login" class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">
        @csrf
        <div>
            <label for="email" class="mb-1 block text-sm font-medium">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full rounded-lg border border-slate-300 p-2.5 focus:border-emerald-500 focus:ring-emerald-500">
            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="mb-1 block text-sm font-medium">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full rounded-lg border border-slate-300 p-2.5 focus:border-emerald-500 focus:ring-emerald-500">
            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="w-full rounded-lg bg-emerald-600 px-4 py-2.5 font-semibold text-white hover:bg-emerald-700">
            Sign in
        </button>
    </form>
</div>
@endsection
