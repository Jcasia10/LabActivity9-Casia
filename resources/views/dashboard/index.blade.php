@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="mb-8 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
    <div>
        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Vaccination desk</p>
        <h1 class="mt-1 text-3xl font-bold text-slate-900">{{ $title }}</h1>
        <p class="mt-2 text-slate-500">A quick view of your community immunization work.</p>
    </div>
    <a href="/schedule" class="rounded-lg bg-emerald-600 px-4 py-2 text-center text-sm font-semibold text-white hover:bg-emerald-700">View full schedule</a>
</div>

<div class="grid gap-4 md:grid-cols-4">
    @foreach ($stats as $stat)
        <x-stat-card :title="$stat['label']" :value="$stat['value']" />
    @endforeach
</div>

<div class="mt-6">
    @if ($alerts->count() > 0)
        <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-amber-900">
            <span class="font-semibold">{{ $alerts->count() }} overdue {{ Str::plural('appointment', $alerts->count()) }} need attention.</span>
            Please contact the resident before the next clinic day.
        </div>
    @elseif ($schedules->isEmpty())
        <div class="rounded-xl border border-blue-200 bg-blue-50 p-4 text-blue-900">Special case: no vaccine stock has been recorded yet.</div>
    @else
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-900">All clear: there are no overdue appointments.</div>
    @endif
</div>

<div class="mt-6">
    <x-panel title="Upcoming and recent appointments">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="text-xs uppercase tracking-wide text-slate-500">
                    <tr><th class="pb-3">#</th><th class="pb-3">Resident</th><th class="pb-3">Vaccine</th><th class="pb-3">Date</th><th class="pb-3">Status</th></tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr class="{{ $loop->odd ? 'bg-slate-50' : 'bg-white' }} border-t border-slate-100">
                            <td class="px-2 py-3">{{ $loop->iteration }}</td>
                            <td class="px-2 py-3 font-medium">{{ $schedule->patient_name }}<span class="block text-xs text-slate-500">{{ $schedule->purok }}</span></td>
                            <td class="px-2 py-3">{{ $schedule->vaccine }} <span class="text-xs text-slate-500">({{ $schedule->dose }})</span></td>
                            <td class="px-2 py-3">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                            <td class="px-2 py-3">
                                @unless ($schedule->status === 'Overdue')
                                    <span class="rounded-full bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-800">{{ $schedule->status }}</span>
                                @else
                                    <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-800">Overdue</span>
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-8 text-center text-slate-500">No schedules yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection
