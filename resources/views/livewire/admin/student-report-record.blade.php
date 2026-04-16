<div class="max-w-7xl mx-auto pb-10 print:m-0 print:p-0 print:max-w-full">
    <!-- Screen View (Hides during PDF generation) -->
    <div class="print:hidden">
        <!-- Header Area -->
        <div class="mb-8">
            <h1 class="text-3xl font-black tracking-tight text-slate-800">Student Reports Data List</h1>
            <p class="text-slate-500 font-medium mt-1">Cross-reference and filter all enrolled students by academic year, grade level, and section.</p>
        </div>

        <!-- Data Table Card -->
        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-blue-500 uppercase tracking-widest mb-1">Overview</p>
                    <h2 class="text-xl font-extrabold text-slate-800 uppercase flex items-center gap-2">
                        Report Generator
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

    <!-- PDF/Print View (Only visible during PDF generation) -->
    <div class="hidden print:block w-full bg-white text-black">
        <div class="text-center mb-8 border-b-2 border-black pb-4">
            <h1 class="text-2xl font-bold uppercase tracking-widest">Student Masterlist Report</h1>
            <p class="text-sm font-medium mt-1 text-gray-600">Generated on {{ now()->format('F d, Y') }}</p>
        </div>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 uppercase text-xs tracking-wider">
                    <th class="border border-gray-300 px-4 py-2 font-bold">LRN</th>
                    <th class="border border-gray-300 px-4 py-2 font-bold">Student Name</th>
                    <th class="border border-gray-300 px-4 py-2 font-bold">School Year</th>
                    <th class="border border-gray-300 px-4 py-2 font-bold">Grade Level</th>
                    <th class="border border-gray-300 px-4 py-2 font-bold">Section</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    // Retrieve students dynamically based on the current Filament filter state before printing
                    $students = $this->getFilteredTableQuery()->get(); 
                @endphp
                
                @forelse($students as $student)
                    <tr class="text-sm">
                        <td class="border border-gray-300 px-4 py-2">{{ $student->user?->lrn ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $student->user?->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->schoolYear?->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->gradeLevel?->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->section?->name ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-6 text-center text-gray-500 italic">No student records found matching the current filters.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="mt-10 text-xs text-center text-gray-400">
            * End of Report *
        </div>
    </div>
</div>
