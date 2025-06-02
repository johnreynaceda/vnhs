@section('title', 'Overview')
<div>
    <div class="grid grid-cols-4 gap-5">
        <div class="border bg-white rounded-xl p-5">
            <div class="flex justify-between text-gray-600 items-end">
                <h2 class=" ">Registered Students</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-users-round">
                    <path d="M18 21a8 8 0 0 0-16 0" />
                    <circle cx="10" cy="8" r="5" />
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
            </div>
            <div class="mt-3">
                <p class="text-4xl text-blue-700 font-semibold">0</p>
            </div>
        </div>
        <div class="border bg-white rounded-xl p-5">
            <div class="flex justify-between text-gray-600 items-end">
                <h2 class=" ">Teaching Staff</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-users-round">
                    <path d="M18 21a8 8 0 0 0-16 0" />
                    <circle cx="10" cy="8" r="5" />
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
            </div>
            <div class="mt-3">
                <p class="text-4xl text-blue-700 font-semibold">0</p>
            </div>
        </div>
        <div class="border bg-white rounded-xl p-5">
            <div class="flex justify-between text-gray-600 items-end">
                <h2 class=" ">Messages</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-mail-plus">
                    <path d="M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    <path d="M19 16v6" />
                    <path d="M16 19h6" />
                </svg>
            </div>
            <div class="mt-3">
                <p class="text-4xl text-blue-700 font-semibold">0</p>
            </div>
        </div>
        <div class="border bg-white rounded-xl p-5">
            <div class="flex justify-between text-gray-600 items-end">
                <h2 class=" ">Documents Request</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-file-search">
                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                    <path d="M4.268 21a2 2 0 0 0 1.727 1H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                    <path d="m9 18-1.5-1.5" />
                    <circle cx="5" cy="14" r="3" />
                </svg>
            </div>
            <div class="mt-3">
                <p class="text-4xl text-blue-700 font-semibold">0</p>
            </div>
        </div>
    </div>
    <div class="mt-10 grid grid-cols-2 gap-10">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="bg-white rounded-xl p-5">
            <canvas id="myChart"></canvas>
            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
        <div class="bg-white h-64 rounded-xl p-5 relative">
            <canvas id="myChart1" class="w-full h-full"></canvas>
            <script>
                const ctx1 = document.getElementById('myChart1');

                new Chart(ctx1, {
                    type: 'doughnut',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'left', // Legend on the left
                                align: 'center'
                            }
                        }
                    }
                });
            </script>
        </div>


    </div>
</div>
