@extends('layouts.app')

@section('title', 'Schedule | Bakuna Tracker')

@section('content')
<div class="mb-8">
    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Clinic calendar</p>
    <h1 class="mt-1 text-3xl font-bold text-slate-900">Vaccination schedule</h1>
    <p class="mt-2 text-slate-500">All appointments listed by their scheduled date.</p>
</div>

<x-panel title="Purok Casia residents">
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($schedules as $schedule)
            <article class="rounded-lg border border-slate-200 p-4 {{ $loop->first ? 'ring-2 ring-emerald-200' : '' }}">
                <div class="flex items-start justify-between gap-3">
                    <h2 class="font-semibold">{{ $schedule->patient_name }}</h2>
                    <span class="text-xs text-slate-500">#{{ $loop->iteration }}</span>
                </div>
                <p class="mt-1 text-sm text-slate-500">{{ $schedule->purok }} · {{ $schedule->vaccine }}</p>
                <p class="mt-3 text-sm font-medium text-emerald-700">{{ $schedule->scheduled_at->format('M d, Y') }} · {{ $schedule->dose }}</p>
                <p class="mt-1 text-xs text-slate-500">Status: {{ $schedule->status }}</p>
            </article>
        @empty
            <p class="text-slate-500">No schedules yet.</p>
        @endforelse
    </div>
</x-panel>
@endsection
