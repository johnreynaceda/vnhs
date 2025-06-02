<div>
    <div class=" flex space-x-3 items-center rounded-xl">
        <div class="bg-white p-5 rounded-xl">
            <x-shared.study class="h-20" />
        </div>
        <div class="bg-white p-5 rounded-xl flex-1  ">

            <h1>FULLNAME: {{ auth()->user()->name }}</h1>
            <h1>EMAIL: {{ auth()->user()->email }}</h1>
            <h1>CONTACT NUMBER: {{ auth()->user()->teacher->contact }}</h1>
        </div>
    </div>
    <div class="mt-5 bg-white p-5 rounded-xl">
        <h1 class="text-xl text-gray-600 font-bold">SUBJECTS SCHEDULES
        </h1>
        <div class="mt-5">
            {{ $this->table }}
        </div>
    </div>

</div>
