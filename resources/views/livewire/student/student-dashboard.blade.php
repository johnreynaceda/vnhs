<div class="max-w-7xl mx-auto space-y-8 pb-10">
    <!-- Header Area -->
    <div>
        <h1 class="text-3xl font-black tracking-tight text-slate-800">Student Dashboard</h1>
        <p class="text-slate-500 font-medium mt-1">Welcome back, {{ auth()->user()->name }}! Here's your academic summary.</p>
    </div>

    <!-- Student Info Card -->
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-bl-full -mr-32 -mt-32 opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-emerald-50 rounded-tr-full -ml-16 -mb-16 opacity-50"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-8">
            <div class="w-24 h-24 bg-blue-100 text-blue-600 rounded-3xl flex items-center justify-center flex-shrink-0 shadow-inner">
                <x-shared.study class="w-14 h-14" />
            </div>
            
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Student LRN</p>
                    <h2 class="text-2xl font-black text-blue-600 tracking-wide">{{ auth()->user()->lrn }}</h2>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Full Name</p>
                    <h2 class="text-xl font-bold text-slate-800 uppercase">{{ auth()->user()->name }}</h2>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Grade Level</p>
                    <h2 class="text-xl font-bold text-slate-800 uppercase">
                        @if(auth()->user()->student?->gradeLevel)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                                {{ auth()->user()->student->gradeLevel->name }}
                            </span>
                        @else
                            <span class="text-amber-500 text-sm font-semibold">Pending Enrollment</span>
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Card -->
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-emerald-500 uppercase tracking-widest mb-1">Current Term</p>
                <h2 class="text-2xl font-extrabold text-slate-800 uppercase flex items-center gap-2">
                    Class Schedule
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
