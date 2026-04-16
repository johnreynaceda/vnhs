@section('title', 'Overview')
<div class="space-y-6">
    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Students Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out opacity-50"></div>
            <div class="relative flex justify-between items-start">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Registered Students</p>
                    <h3 class="text-4xl font-bold text-slate-800">{{ $studentsCount }}</h3>
                </div>
                <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-sm font-medium text-blue-600 group-hover:text-blue-700">
                <span>View all students</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </div>
        </div>

        <!-- Teachers Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out opacity-50"></div>
            <div class="relative flex justify-between items-start">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Teaching Staff</p>
                    <h3 class="text-4xl font-bold text-slate-800">{{ $teachersCount }}</h3>
                </div>
                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 22h20"/>
                        <path d="M17 2H7a2 2 0 0 0-2 2v18"/>
                        <path d="M12 22V4"/>
                        <path d="M17 8h.01"/>
                        <path d="M7 8h.01"/>
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-sm font-medium text-emerald-600 group-hover:text-emerald-700">
                <span>View teaching staff</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </div>
        </div>

        <!-- Users Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out opacity-50"></div>
            <div class="relative flex justify-between items-start">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">System Users</p>
                    <h3 class="text-4xl font-bold text-slate-800">{{ $usersCount }}</h3>
                </div>
                <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="5" rx="2"/>
                        <line x1="2" x2="22" y1="10" y2="10"/>
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-sm font-medium text-purple-600 group-hover:text-purple-700">
                <span>Manage accounts</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </div>
        </div>

        <!-- Documents Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-in-out opacity-50"></div>
            <div class="relative flex justify-between items-start">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Document Requests</p>
                    <h3 class="text-4xl font-bold text-slate-800">{{ $documentsCount }}</h3>
                </div>
                <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M4.268 21a2 2 0 0 0 1.727 1H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                        <path d="m9 18-1.5-1.5" />
                        <circle cx="5" cy="14" r="3" />
                    </svg>
                </div>
            </div>
            <div class="relative mt-4 flex items-center text-sm font-medium text-amber-600 group-hover:text-amber-700">
                <span>Process requests</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <!-- Script loads once for both charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <div class="mb-4">
                <h3 class="font-bold text-lg text-slate-800">Enrollment Trends</h3>
                <p class="text-sm font-medium text-slate-400">Monthly breakdown of student enrollments.</p>
            </div>
            <div class="relative h-64 w-full">
                <canvas id="myChart"></canvas>
            </div>
            <script>
                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                        datasets: [{
                            label: 'New Enrollments',
                            data: [120, 190, 300, 50, 20, 30],
                            backgroundColor: '#3b82f6', // Tailwind blue-500
                            borderRadius: 6,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f1f5f9', drawBorder: false }
                            },
                            x: {
                                grid: { display: false, drawBorder: false }
                            }
                        }
                    }
                });
            </script>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col">
            <div class="mb-4">
                <h3 class="font-bold text-lg text-slate-800">Program Distribution</h3>
                <p class="text-sm font-medium text-slate-400">Students distributed by program strands.</p>
            </div>
            <div class="relative flex-1 w-full flex items-center justify-center min-h-[16rem]">
                <canvas id="myChart1"></canvas>
            </div>
            <script>
                const ctx1 = document.getElementById('myChart1');
                
                // Function to generate aesthetically pleasing colors dynamically based on count
                function generateColors(count) {
                    const palettes = [
                        '#3b82f6', '#10b981', '#8b5cf6', '#f59e0b', '#f43f5e', 
                        '#06b6d4', '#84cc16', '#d946ef', '#f97316', '#14b8a6'
                    ];
                    return Array.from({length: count}, (_, i) => palettes[i % palettes.length]);
                }

                const labels = {!! $strandLabels !!};
                const dataValues = {!! $strandData !!};

                new Chart(ctx1, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: dataValues,
                            backgroundColor: generateColors(dataValues.length),
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'right',
                                align: 'center',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: { family: "'Inter', sans-serif", size: 12 }
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
