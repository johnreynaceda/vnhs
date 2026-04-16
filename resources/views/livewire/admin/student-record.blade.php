@section('title', 'Students')
<div>
    <div class="grid grid-cols-9 gap-10">
        <div class="col-span-7">
            <div class="bg-white p-5 rounded-xl">
                {{ $this->table }}
            </div>
        </div>
        <!-- Side Panels -->
        <div class="col-span-2 space-y-6">
            
            <!-- Pending Enlistments Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 flex flex-col overflow-hidden">
                <div class="bg-slate-50/50 border-b border-slate-100 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" x2="19" y1="8" y2="14"/>
                            <line x1="22" x2="16" y1="11" y2="11"/>
                        </svg>
                        <h2 class="font-bold text-slate-700 tracking-tight text-sm">PENDING ENLISTS</h2>
                    </div>
                    <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-2.5 py-0.5 rounded-full">{{ $enlists->count() }}</span>
                </div>
                
                <div class="max-h-[22rem] overflow-y-auto [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-200 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-300">
                    @forelse ($enlists as $item)
                        <div class="p-4 flex items-center justify-between border-b border-slate-50 hover:bg-indigo-50/30 transition-colors duration-200 group">
                            <div class="flex items-start gap-3 min-w-0 flex-1 pr-2">
                                <div class="flex-shrink-0 w-9 h-9 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs mt-0.5 shadow-sm">
                                    {{ substr($item->user->name, 0, 1) }}
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-tight truncate">{{ $item->user->name }}</h3>
                                    <div class="flex items-center gap-1 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-slate-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                            <line x1="3" x2="21" y1="9" y2="9"/>
                                            <path d="M9 14h.01"/>
                                        </svg>
                                        <span class="text-xs font-semibold text-slate-500 truncate">{{ $item->user->lrn }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex-shrink-0">
                                <x-mini-button xs positive icon="hand-thumb-up" wire:click="approveStudent({{ $item->id }})" class="shadow-sm ring-1 ring-emerald-500/20 hover:ring-opacity-100" />
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center flex flex-col items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M17 8l2-2"/>
                                    <path d="M21 8l-2-2"/>
                                    <path d="M19 12v.01"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-slate-600">No Enlisted Students</p>
                            <p class="text-xs text-slate-400 mt-1">Pending requests will appear here.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recently Enrolled Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 flex flex-col overflow-hidden">
                <div class="bg-slate-50/50 border-b border-slate-100 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <polyline points="16 11 18 13 22 9"/>
                        </svg>
                        <h2 class="font-bold text-slate-700 tracking-tight text-sm">RECENTLY ENROLLED</h2>
                    </div>
                    <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2.5 py-0.5 rounded-full">{{ $enrolleds->count() }}</span>
                </div>
                
                <div class="max-h-[22rem] overflow-y-auto [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-200 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-300">
                    @forelse ($enrolleds as $enrolled)
                        <div class="p-4 flex items-center justify-between border-b border-slate-50 hover:bg-emerald-50/30 transition-colors duration-200 group">
                            <div class="flex items-start gap-3 min-w-0 flex-1 pr-2">
                                <div class="flex-shrink-0 w-9 h-9 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xs mt-0.5 shadow-sm">
                                    {{ substr($enrolled->user->name, 0, 1) }}
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-tight truncate">{{ $enrolled->user->name }}</h3>
                                    <div class="flex items-center gap-1 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-slate-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                            <line x1="3" x2="21" y1="9" y2="9"/>
                                            <path d="M9 14h.01"/>
                                        </svg>
                                        <span class="text-xs font-semibold text-slate-500 truncate">{{ $enrolled->user->lrn }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right flex flex-col items-end flex-shrink-0">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">Approved</span>
                                <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded-md">{{ \Carbon\Carbon::parse($enrolled->updated_at)->format('M d') }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center flex flex-col items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M17 14l2-2 2 2"/>
                                    <path d="M19 12v6"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-slate-600">No Enrolled Students</p>
                            <p class="text-xs text-slate-400 mt-1">Approved students will list here.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
