<nav class="flex flex-1 flex-col">
    <ul role="list" class="flex flex-1 flex-col gap-y-7">
        <li>
            <ul role="list" class="-mx-2 space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-circle-gauge">
                            <path d="M15.6 2.7a10 10 0 1 0 5.7 5.7" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M13.4 10.6 19 5" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.document-requests') }}"
                        class="{{ request()->routeIs('admin.document-requests') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-file-search">
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="M4.268 21a2 2 0 0 0 1.727 1H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                            <path d="m9 18-1.5-1.5" />
                            <circle cx="5" cy="14" r="3" />
                        </svg>
                        Documents Requests
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.students') }}" x-navigate
                        class="{{ request()->routeIs('admin.students') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-users-round">
                            <path d="M18 21a8 8 0 0 0-16 0" />
                            <circle cx="10" cy="8" r="5" />
                            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                        </svg>
                        Students
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.teachers') }}"
                        class="{{ request()->routeIs('admin.teachers') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-users-round">
                            <path d="M18 21a8 8 0 0 0-16 0" />
                            <circle cx="10" cy="8" r="5" />
                            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                        </svg>
                        Teachers
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.school-years') }}"
                        class="{{ request()->routeIs('admin.school-years') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-calendar-days">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <rect width="18" height="18" x="3" y="4" rx="2" />
                            <path d="M3 10h18" />
                            <path d="M8 14h.01" />
                            <path d="M12 14h.01" />
                            <path d="M16 14h.01" />
                            <path d="M8 18h.01" />
                            <path d="M12 18h.01" />
                            <path d="M16 18h.01" />
                        </svg>
                        School Year
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.document-type') }}"
                        class="{{ request()->routeIs('admin.document-type') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-600' }} group flex gap-x-2 rounded-md  p-2 text-sm/6   hover:text-blue-600 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-file-text-icon lucide-file-text">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="M10 9H8" />
                            <path d="M16 13H8" />
                            <path d="M16 17H8" />
                        </svg>
                        Document Type
                    </a>
                </li>

        </li>

    </ul>
    </li>
    <li>
        <div class="text-xs/6 font-semibold text-gray-400">OTHERS</div>
        <ul role="list" class="-mx-2 mt-2 space-y-1">
            <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                <a href="{{ route('admin.tracks') }}"
                    class="{{ request()->routeIs('admin.tracks') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex gap-x-3 rounded-md p-2 text-sm/6   hover:bg-gray-50  hover:text-blue-600">
                    <span
                        class="{{ request()->routeIs('admin.tracks') ? 'bg-blue-500 text-white font-semibold' : 'bg-white' }} flex size-6 shrink-0 items-center justify-center rounded-lg border border-gray-200  text-[0.625rem]  text-gray-400 group-hover:border-blue-600 group-hover:text-blue-600">T</span>
                    <span class="truncate">Tracks</span>
                </a>
            </li>
            <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                <a href="{{ route('admin.strands') }}"
                    class="{{ request()->routeIs('admin.strands') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex gap-x-3 rounded-md p-2 text-sm/6   hover:bg-gray-50  hover:text-blue-600">
                    <span
                        class="{{ request()->routeIs('admin.strands') ? 'bg-blue-500 text-white font-semibold' : 'bg-white' }} flex size-6 shrink-0 items-center justify-center rounded-lg border border-gray-200  text-[0.625rem]  text-gray-400 group-hover:border-blue-600 group-hover:text-blue-600">S</span>
                    <span class="truncate">Strands</span>
                </a>
            </li>
            {{-- <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                <a href="#"
                    class="group flex gap-x-3 rounded-md p-2 text-sm/6  text-gray-700 hover:bg-gray-50 hover:text-blue-600">
                    <span
                        class="flex size-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem]  text-gray-400 group-hover:border-blue-600 group-hover:text-blue-600">S</span>
                    <span class="truncate">Subjects</span>
                </a>
            </li> --}}
            <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                <a href="{{ route('admin.sections') }}"
                    class="{{ request()->routeIs('admin.sections') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex gap-x-3 rounded-md p-2 text-sm/6   hover:bg-gray-50  hover:text-blue-600">
                    <span
                        class="{{ request()->routeIs('admin.sections') ? 'bg-blue-500 text-white font-semibold' : 'bg-white' }} flex size-6 shrink-0 items-center justify-center rounded-lg border border-gray-200  text-[0.625rem]  text-gray-400 group-hover:border-blue-600 group-hover:text-blue-600">S</span>
                    <span class="truncate">Sections</span>
                </a>
            </li>
            {{-- <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                <a href="{{ route('admin.schedules') }}"
                    class="{{ request()->routeIs('admin.schedules') ? 'bg-gray-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex gap-x-3 rounded-md p-2 text-sm/6   hover:bg-gray-50  hover:text-blue-600">
                    <span
                        class="{{ request()->routeIs('admin.schedules') ? 'bg-blue-500 text-white font-semibold' : 'bg-white' }} flex size-6 shrink-0 items-center justify-center rounded-lg border border-gray-200  text-[0.625rem]  text-gray-400 group-hover:border-blue-600 group-hover:text-blue-600">S</span>
                    <span class="truncate">Schedules</span>
                </a>
            </li> --}}


        </ul>
    </li>
    <li>
        <ul role="list" class="-mx-2 space-y-1">
            <li x-data="{ open: false }">
                <button type="button" x-on:click="open = !open"
                    class="group flex w-full items-center justify-between gap-x-2 rounded-md p-2 text-sm/6 text-gray-600 hover:text-blue-600 hover:bg-gray-50">
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chart-column-increasing">
                            <path d="M13 17V9" />
                            <path d="M18 17V5" />
                            <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                            <path d="M8 17v-3" />
                        </svg>
                        Report
                    </div>
                    <svg class="h-4 w-4 shrink-0 text-gray-400 transition-transform duration-200 group-hover:text-blue-600"
                        :class="open ? 'rotate-90 text-blue-600' : ''" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="open" style="display: none;" role="list" class="mt-1 space-y-1 px-2">
                    <li>
                        <a href="{{ route('admin.student-report') }}"
                            class="block rounded-md py-2 pr-2 pl-9 text-sm/6 text-gray-600 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('admin.student-report') ? 'bg-gray-100 text-blue-700 font-semibold' : '' }}">Student
                            Report</a>
                    </li>
                </ul>
            </li>
            <li x-data="{ open: false }">
                <button type="button" x-on:click="open = !open"
                    class="group flex w-full items-center justify-between gap-x-2 rounded-md p-2 text-sm/6 text-gray-600 hover:text-blue-600 hover:bg-gray-50">
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-settings">
                            <path
                                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        Settings
                    </div>
                    <svg class="h-4 w-4 shrink-0 text-gray-400 transition-transform duration-200 group-hover:text-blue-600"
                        :class="open ? 'rotate-90 text-blue-600' : ''" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="open" style="display: none;" role="list" class="mt-1 space-y-1 px-2">
                    <li>
                        <a href="{{ route('admin.users') }}"
                            class="block rounded-md py-2 pr-2 pl-9 text-sm/6 text-gray-600 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('admin.users') ? 'bg-gray-100 text-blue-700 font-semibold' : '' }}">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.audit-trails') }}"
                            class="block rounded-md py-2 pr-2 pl-9 text-sm/6 text-gray-600 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('admin.audit-trails') ? 'bg-gray-100 text-blue-700 font-semibold' : '' }}">Audit
                            Trail</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    </ul>
</nav>