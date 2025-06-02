<div>
    @if ($student->is_enlisted)
        <div class="grid mt-10 place-content-center">
            <x-shared.enlist class="h-96" />
            <p class="text-center mt-5">
                <span class="text-2xl font-bold text-gray-600">You are already enlisted as a student!</span>
                <br>
                <span class="text-lg text-gray-500">Please wait for the administrator to approve your enlistment.</span>
            </p>
        </div>
    @else
        <h1 class="text-2xl font-bold text-gray-600">ENROLL NOW</h1>
        <div class="mt-5 grid grid-cols-5 gap-5">
            <div class="col-span-2">
                <div class="bg-white py-2 px-5 rounded-xl">
                    <x-shared.study class="h-20" />
                    <h1 class=" text-gray-700">Student Name: <strong
                            class="uppercase text-xl">{{ $student->user->name }}</strong>
                    </h1>
                    <h1 class=" text-gray-700">LRN: <strong class="uppercase text-xl">{{ $student->user->lrn }}</strong>
                    </h1>
                    <x-button label="Display Available Subjects" class="font-semibold uppercase mt-2"
                        right-icon="arrow-down" wire:click="displaySubject" xs outline info squared />
                </div>
            </div>
            <div class="col-span-3 bg-white  rounded-xl p-5">
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <h1>Grade Level</h1>
                        <x-filament::input.wrapper>
                            <x-filament::input.select wire:model.live="grade_level_id">
                                <option value="draft">Select An Option</option>
                                @foreach ($gradeLevels as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-filament::input.select>
                        </x-filament::input.wrapper>
                    </div>
                    <div>
                        <h1>Track</h1>
                        <x-filament::input.wrapper>
                            <x-filament::input.select wire:model.live="track_id">
                                <option value="draft">Select An Option</option>
                                @foreach ($tracks as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-filament::input.select>
                        </x-filament::input.wrapper>
                    </div>
                    <div>
                        <h1>Strand</h1>
                        <x-filament::input.wrapper>
                            <x-filament::input.select wire:model.live="strand_id">
                                <option value="draft">Select An Option</option>
                                @foreach ($strands as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-filament::input.select>
                        </x-filament::input.wrapper>
                    </div>
                    <div>
                        <h1>Section</h1>
                        <x-filament::input.wrapper>
                            <x-filament::input.select wire:model.live="section_id">
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
        <div class="mt-5 bg-white py-2 px-5 rounded-xl">
            @if (!$subjects)
                <div class="grid place-content-center">
                    <x-shared.schedule class="h-96" />
                </div>
            @else
                <div>
                    <h1 class="text-2xl font-bold uppercase text-blue-600">SUBJECTS FOR {{ $name }}</h1>
                    <div class="mt-4">
                        <div class="flex flex-col">
                            <div class=" overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden border rounded-lg border-gray-300">
                                        <table class=" min-w-full rounded-xl">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        SUBJECT </th>
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        SECTION </th>
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        DAY </th>
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        ROOM # </th>
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        START TIME </th>
                                                    <th scope="col"
                                                        class="py-2 px-5 text-left text-sm leading-6 font-semibold text-gray-700 capitalize">
                                                        END TIME </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($subjects as $item)
                                                    <tr class="odd:bg-white even:bg-gray-50">
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-700 ">
                                                            {{ $item->strandSubject->name }}</td>
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ $item->section->name }} </td>
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ $item->day }}</td>
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ $item->room_number }}</td>
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                        </td>
                                                        <td
                                                            class="py-2 px-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                            {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <x-button label="Enroll Now" class="font-semibold uppercase" right-icon="check"
                            wire:click="enrollStudent" spinner="enrollStudent" xs positive squared />
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
