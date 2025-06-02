<div>
    <div class=" flex space-x-3 items-center rounded-xl">
        <div class="bg-white p-2 rounded-xl">
            <x-shared.file class="h-14" />
        </div>
        <div class="bg-white p-5 rounded-xl flex-1  ">
            <h1 class="text-2xl font-semibold    text-gray-600">DOCUMENT REQUESTS</h1>
        </div>
    </div>
    <div class="mt-5 bg-white p-5 rounded-xl">

        <div class="mt-5">
            {{ $this->table }}
        </div>
    </div>
</div>
