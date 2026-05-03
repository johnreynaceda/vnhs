<div class="mx-auto max-w-7xl space-y-6 pb-10">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Assigned Sections</h1>
            <p class="text-sm font-medium text-slate-500">Sections assigned to you for the active school year.</p>
        </div>
        <div class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600">
            {{ $activeSchoolYear?->name ?? 'No active school year' }}
        </div>
    </div>

    <section class="rounded-lg border border-slate-200 bg-white">
        <div class="divide-y divide-slate-100">
            @forelse ($assignedSections as $section)
                @php
                    $students = $section->students
                        ->where('school_year_id', $activeSchoolYear?->id)
                        ->where('is_enrolled', true)
                        ->values();
                @endphp
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-slate-800">{{ $section->name }}</h2>
                            <p class="text-sm text-slate-500">{{ $section->strand?->name }} students</p>
                        </div>
                        <span class="rounded-md bg-slate-100 px-2 py-1 text-xs font-bold text-slate-600">{{ $students->count() }}</span>
                    </div>
                    <div class="mt-4 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @forelse ($students as $student)
                            <div class="rounded-md border border-slate-100 px-3 py-2">
                                <p class="text-sm font-semibold text-slate-800">{{ $student->user?->name }}</p>
                                <p class="text-xs text-slate-500">{{ $student->user?->lrn }}</p>
                            </div>
                        @empty
                            <p class="text-sm font-medium text-slate-400">No enrolled students for this school year.</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-sm font-medium text-slate-400">No assigned sections for the active school year.</div>
            @endforelse
        </div>
    </section>
</div>
