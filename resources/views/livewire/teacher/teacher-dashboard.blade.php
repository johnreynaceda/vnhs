<div class="max-w-7xl mx-auto space-y-8 pb-10">
    <!-- Header Area -->
    <div>
        <h1 class="text-3xl font-black tracking-tight text-slate-800">Instructor Dashboard</h1>
        <p class="text-slate-500 font-medium mt-1">Welcome back, {{ auth()->user()->name }}! Here's your teaching assignment overview.</p>
    </div>

    <!-- Teacher Info Card -->
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-violet-50 rounded-bl-full -mr-32 -mt-32 opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-fuchsia-50 rounded-tr-full -ml-16 -mb-16 opacity-50"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-8">
            <div class="w-24 h-24 bg-violet-100 text-violet-600 rounded-3xl flex items-center justify-center flex-shrink-0 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
            </div>
            
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Full Name</p>
                    <h2 class="text-2xl font-black text-violet-600 uppercase tracking-wide">{{ auth()->user()->name }}</h2>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Email Address</p>
                    <h2 class="text-xl font-bold text-slate-800">{{ auth()->user()->email }}</h2>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Contact Number</p>
                    <h2 class="text-xl font-bold text-slate-800">
                        @if(auth()->user()->teacher)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-fuchsia-50 text-fuchsia-700 border border-fuchsia-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                {{ auth()->user()->teacher->contact }}
                            </span>
                        @else
                            <span class="text-amber-500 text-sm font-semibold">Profile Incomplete</span>
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
                <p class="text-xs font-bold text-violet-500 uppercase tracking-widest mb-1">Current Workload</p>
                <h2 class="text-2xl font-extrabold text-slate-800 uppercase flex items-center gap-2">
                    Subject Schedules
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
