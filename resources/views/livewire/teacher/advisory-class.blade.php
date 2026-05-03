<div class="mx-auto max-w-7xl space-y-6 pb-10">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Advisory Class</h1>
            <p class="text-sm font-medium text-slate-500">Your advisory class, students, and advisory module uploads.</p>
        </div>
        <div class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600">
            {{ $activeSchoolYear?->name ?? 'No active school year' }}
        </div>
    </div>

    <section class="rounded-lg border border-slate-200 bg-white">
        <div class="divide-y divide-slate-100">
            @forelse ($advisorySections as $section)
                @php
                    $students = $section->students
                        ->where('school_year_id', $activeSchoolYear?->id)
                        ->where('is_enrolled', true)
                        ->values();
                    $modules = $section->modules
                        ->where('teacher_id', auth()->user()->teacher?->id)
                        ->where('school_year_id', $activeSchoolYear?->id)
                        ->whereNull('schedule_id')
                        ->values();
                @endphp
                <div class="p-5">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <h2 class="font-bold text-slate-800">{{ $section->name }}</h2>
                            <p class="text-sm text-slate-500">{{ $students->count() }} enrolled students</p>
                        </div>
                        <form wire:submit.prevent="uploadAdvisoryModule({{ $section->id }})" class="flex items-center gap-2">
                            <input type="file" wire:model="advisoryFiles.{{ $section->id }}" class="block w-56 text-sm text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-blue-700">
                            <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white">Upload</button>
                        </form>
                    </div>

                    <div class="mt-4">
                        <p class="mb-2 text-xs font-bold uppercase text-slate-400">Uploaded Files</p>
                        <div class="flex flex-wrap gap-2">
                            @forelse ($modules as $module)
                                <span class="rounded-md border border-slate-200 px-3 py-1 text-sm font-medium text-slate-700">{{ $module->file_name }}</span>
                            @empty
                                <span class="text-sm font-medium text-slate-400">No files uploaded.</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-4 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @forelse ($students as $student)
                            <div class="rounded-md border border-slate-100 px-3 py-2">
                                <p class="text-sm font-semibold text-slate-800">{{ $student->user?->name }}</p>
                                <p class="text-xs text-slate-500">{{ $student->user?->lrn }}</p>
                            </div>
                        @empty
                            <p class="text-sm font-medium text-slate-400">No enrolled students for this advisory class.</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-sm font-medium text-slate-400">No advisory class assigned.</div>
            @endforelse
        </div>
    </section>
</div>
