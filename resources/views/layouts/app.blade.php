<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
    <nav class="bg-emerald-700 text-white shadow">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-3 px-4 py-4 sm:px-6">
            <a href="/dashboard" class="text-xl font-bold tracking-tight">Bakuna Tracker</a>
            <div class="flex items-center gap-4 text-sm">
                @auth
                    <a href="/dashboard" class="hover:text-emerald-100">Dashboard</a>
                    <a href="/schedule" class="hover:text-emerald-100">Schedule</a>
                    <span class="hidden border-l border-emerald-500 pl-4 md:inline">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="rounded bg-emerald-800 px-3 py-1.5 hover:bg-emerald-900">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="hover:text-emerald-100">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:py-10">
        @yield('content')
    </main>

    <footer class="mt-8 border-t bg-white">
        <div class="mx-auto max-w-6xl px-4 py-5 text-sm text-slate-500 sm:px-6">
            Barangay Matina Crossing Health Center &middot; Davao City
        </div>
    </footer>
</body>
</html>
