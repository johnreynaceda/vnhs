<div class="mx-auto max-w-7xl space-y-6 pb-10">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Instructor Dashboard</h1>
            <p class="text-sm font-medium text-slate-500">Welcome back, {{ auth()->user()->name }}.</p>
        </div>
        <div class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600">
            {{ $activeSchoolYear?->name ?? 'No active school year' }}
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-3">
        <div class="rounded-lg border border-slate-200 bg-white p-5">
            <p class="text-xs font-semibold uppercase text-slate-400">Full Name</p>
            <p class="mt-1 text-lg font-bold text-slate-800">{{ auth()->user()->name }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5">
            <p class="text-xs font-semibold uppercase text-slate-400">Email Address</p>
            <p class="mt-1 text-lg font-bold text-slate-800">{{ auth()->user()->email }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5">
            <p class="text-xs font-semibold uppercase text-slate-400">Contact Number</p>
            <p class="mt-1 text-lg font-bold text-slate-800">{{ auth()->user()->teacher?->contact ?? 'Profile incomplete' }}</p>
        </div>
    </div>

    <section class="rounded-lg border border-slate-200 bg-white">
        <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="text-lg font-bold text-slate-800">Subject Schedules</h2>
        </div>
        <div class="p-5">
            {{ $this->table }}
        </div>
    </section>
</div>
