@section('title', 'Students')
<div>
    <div class="grid grid-cols-9 gap-10">
        <div class="col-span-7">
            <div class="bg-white p-5 rounded-xl">
                {{ $this->table }}
            </div>
        </div>
        <div class="col-span-2 space-y-5">
            <div>
                <h1 class="font-bold text-xl text-gray-600">ENLIST({{ $enlists->count() }})</h1>
                <ul class="mt-2 max-h-64 space-y-1">
                    @forelse ($enlists as $item)
                        <li class="flex bg-white p-2 rounded-lg px-4 text-sm justify-between items-center">
                            <div>
                                <h1>LRN: {{ $item->user->lrn }}</h1>
                                <h1 class="uppercase font-semibold text-gray-600">NAME: {{ $item->user->name }}</h1>
                            </div>
                            <x-mini-button xs positive icon="hand-thumb-up"
                                wire:click="approveStudent({{ $item->id }})" />
                        </li>
                    @empty
                        <li>
                            <h1 class="text-center text-gray-600">No Enlisteds Students</h1>
                        </li>
                    @endforelse
                </ul>
            </div>
            <div>
                <h1 class="font-bold text-xl text-gray-600">ENROLLED({{ $enrolleds->count() }})</h1>
                <ul class="mt-2 max-h-64 ">
                    @forelse ($enrolleds as $enrolled)
                        <li class="flex bg-white p-2 rounded-lg px-4 text-sm justify-between items-center">
                            <div>
                                <h1>LRN: {{ $enrolled->user->lrn }}</h1>
                                <h1 class="uppercase font-semibold text-gray-600">NAME: {{ $enrolled->user->name }}</h1>
                            </div>
                            <span
                                class="text-sm">{{ \Carbon\Carbon::parse($enrolled->updated_at)->format('F d, Y') }}</span>
                        </li>
                    @empty
                        <li>
                            <h1 class="text-center text-gray-600">No Enrolled Students</h1>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
