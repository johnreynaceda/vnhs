<div class="max-w-7xl mx-auto space-y-8 pb-10">
    <!-- Header Area -->
    <div>
        <h1 class="text-3xl font-black tracking-tight text-slate-800">Document Center</h1>
        <p class="text-slate-500 font-medium mt-1">Request and track your academic credentials and forms.</p>
    </div>

    <!-- Header Card -->
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-amber-50 rounded-bl-full -mr-32 -mt-32 opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-orange-50 rounded-tr-full -ml-16 -mb-16 opacity-50"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
            <div class="w-20 h-20 bg-amber-100 text-amber-600 rounded-3xl flex items-center justify-center flex-shrink-0 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                    <path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z" />
                    <path d="M20 18v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h8" />
                </svg>
            </div>
            
            <div class="flex-1 w-full">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Administrative Office</p>
                <h2 class="text-2xl font-black text-amber-600 tracking-wide uppercase">Request Records</h2>
            </div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-amber-500 uppercase tracking-widest mb-1">Overview</p>
                <h2 class="text-xl font-extrabold text-slate-800 uppercase flex items-center gap-2">
                    My Document Requests
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
