@section('title', 'Users Management')
<div>
    <div class="grid grid-cols-1 gap-10">
        <div>
            <div class="bg-white p-5 rounded-xl">
                {{ $this->table }}
            </div>
        </div>
    </div>
</div>
