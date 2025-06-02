@section('title', 'Strand Subjects')
<div>
    <div class="grid grid-cols-9 gap-10">
        <div class="col-span-7">
            <div class="bg-white p-5 rounded-xl">
                <div>
                    <h1 class="font-bold text-lg text-blue-600 uppercase">{{ $strand->description }}</h1>
                    <p class="text-gray-600 ">{{ $strand->gradeLevel->name }}</p>
                </div>
                <div class="mt-2">
                    {{ $this->table }}
                </div>
            </div>
        </div>
        <div class="col-span-3"></div>
    </div>
</div>
