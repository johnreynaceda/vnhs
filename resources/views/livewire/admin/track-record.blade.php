@section('title', 'Tracks')
<div>
    <div class="grid grid-cols-9 gap-10">
        <div class="col-span-7">
            <div class="bg-white p-5 rounded-xl">
                {{ $this->table }}
            </div>
        </div>
        <div class="col-span-3"></div>
    </div>
</div>
