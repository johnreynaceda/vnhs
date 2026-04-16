<div class="max-w-7xl mx-auto space-y-6 pb-10">
    @if ($student->is_enlisted)
        <div class="min-h-[70vh] flex items-center justify-center">
            <div class="bg-white rounded-3xl p-10 max-w-lg w-full text-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col items-center">
                <div class="relative w-48 h-48 mb-6">
                    <div class="absolute inset-0 bg-blue-100 rounded-full animate-pulse opacity-50"></div>
                    <x-shared.enlist class="w-full h-full relative z-10" />
                </div>
                <h2 class="text-2xl font-black tracking-tight text-slate-800 mb-2">Enlistment Pending</h2>
                <p class="text-slate-500 leading-relaxed font-medium">
                    You are already enlisted! Please wait for our administrators to review and approve your application.
                </p>
                <div class="mt-8 px-6 py-3 bg-slate-50 rounded-xl border border-slate-100 flex items-center gap-3 text-sm text-slate-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Awaiting Approval
                </div>
            </div>
        </div>
    @else
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black tracking-tight text-slate-800">Enrollment Portal</h1>
                <p class="text-slate-500 font-medium mt-1">Select your preferred program to view the matching schedules.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-8">
            <!-- Left Column: Student Profiling -->
            <div class="lg:col-span-4 space-y-6">
                <!-- User Profile Card -->
                <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-16 -mt-16 opacity-50"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-inner">
                            <x-shared.study class="w-12 h-12" />
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Student Name</p>
                                <h1 class="text-xl font-black text-slate-800 uppercase leading-none">{{ $student->user->name }}</h1>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Student LRN</p>
                                <h1 class="text-xl font-black text-blue-600 uppercase leading-none tracking-wide">{{ $student->user->lrn }}</h1>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-100">
                           <x-button label="Load Available Subjects" class="w-full font-bold uppercase transition-transform hover:-translate-y-0.5"
                                right-icon="arrow-down" wire:click="displaySubject" md positive rounded />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Program Selection -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        </div>
                        <h2 class="text-xl font-extrabold text-slate-800">Academic Program</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Grade Level -->
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600 transition-colors">Grade Level</label>
                            <x-filament::input.wrapper class="shadow-sm overflow-hidden">
                                <x-filament::input.select wire:model.live="grade_level_id" class="border-none focus:ring-0">
                                    <option value="draft">Select An Option</option>
                                    @foreach ($gradeLevels as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-filament::input.select>
                            </x-filament::input.wrapper>
                        </div>
                        
                        <!-- Track -->
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600 transition-colors">Track</label>
                            <x-filament::input.wrapper class="shadow-sm overflow-hidden">
                                <x-filament::input.select wire:model.live="track_id" class="border-none focus:ring-0">
                                    <option value="draft">Select An Option</option>
                                    @foreach ($tracks as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-filament::input.select>
                            </x-filament::input.wrapper>
                        </div>
                        
                        <!-- Strand -->
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600 transition-colors">Strand</label>
                            <x-filament::input.wrapper class="shadow-sm overflow-hidden">
                                <x-filament::input.select wire:model.live="strand_id" class="border-none focus:ring-0">
                                    <option value="draft">Select An Option</option>
                                    @foreach ($strands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-filament::input.select>
                            </x-filament::input.wrapper>
                        </div>
                        
                        <!-- Section -->
                        <div class="group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-blue-600 transition-colors">Section</label>
                            <x-filament::input.wrapper class="shadow-sm overflow-hidden">
                                <x-filament::input.select wire:model.live="section_id" class="border-none focus:ring-0">
                                    <option value="draft">Select An Option</option>
                                    @foreach ($sections as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </x-filament::input.select>
                            </x-filament::input.wrapper>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Display Area -->
        <div class="mt-8 bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
            @if (!$subjects)
                <div class="h-96 flex flex-col items-center justify-center p-10 bg-slate-50/50">
                    <x-shared.schedule class="h-48 w-48 mb-6 opacity-70" />
                    <h3 class="text-lg font-bold text-slate-600">No Subjects Selected</h3>
                    <p class="text-slate-400 text-sm mt-1 max-w-sm text-center">Fill out your academic program details above and click "Load Available Subjects" to view your prospective schedule.</p>
                </div>
            @else
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                        <div>
                            <p class="text-xs font-bold text-emerald-500 uppercase tracking-widest mb-1">Generated Schedule</p>
                            <h2 class="text-2xl font-extrabold text-slate-800 uppercase">{{ $name }}</h2>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto rounded-2xl border border-slate-200 shadow-sm custom-scrollbar">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                                    <th class="py-4 px-6 text-slate-800">Subject</th>
                                    <th class="py-4 px-6">Section</th>
                                    <th class="py-4 px-6">Day</th>
                                    <th class="py-4 px-6">Room #</th>
                                    <th class="py-4 px-6 text-emerald-600 text-right">Schedule Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse ($subjects as $item)
                                    <tr class="hover:bg-slate-50/60 transition-colors group">
                                        <td class="py-4 px-6 text-sm font-bold text-slate-800">{{ $item->strandSubject->name }}</td>
                                        <td class="py-4 px-6 text-sm font-semibold text-slate-600">{{ $item->section->name }}</td>
                                        <td class="py-4 px-6 text-sm font-semibold text-slate-600">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white border border-slate-200 shadow-sm text-slate-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                                {{ $item->day }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-semibold text-slate-600">
                                            <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700">{{ $item->room_number }}</span>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-bold text-slate-700 text-right">
                                            {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-12 text-center text-slate-400 font-medium">No subjects allocated for this configuration.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <x-button label="Submit Enrollment" class="font-extrabold uppercase tracking-wide px-8 py-3 transition-transform hover:-translate-y-0.5 shadow-lg shadow-blue-500/30" 
                            right-icon="check-circle" wire:click="enrollStudent" spinner="enrollStudent" lg primary rounded />
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
