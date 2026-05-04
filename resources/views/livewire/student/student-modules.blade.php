<div class="max-w-7xl mx-auto space-y-8 pb-10">
    <div>
        <h1 class="text-3xl font-black tracking-tight text-slate-800">Modules</h1>
        <p class="text-slate-500 font-medium mt-1">View and download modules uploaded for your class.</p>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold text-blue-500 uppercase tracking-widest mb-1">Learning Materials</p>
                <h2 class="text-2xl font-extrabold text-slate-800 uppercase flex flex-wrap items-center gap-2">
                    Class Modules
                    @if(auth()->user()->student?->section)
                        <span class="text-sm font-semibold text-slate-500 normal-case bg-slate-100 px-3 py-1 rounded-full">Sec: {{ auth()->user()->student->section->name }}</span>
                    @endif
                </h2>
            </div>
        </div>

        <div class="p-8">
            <div class="rounded-2xl overflow-hidden border border-slate-200">
                {{ $this->table }}
            </div>
        </div>
    </div>
</div>
