@php
    $userType = auth()->user()->user_type;

    $baseLinkClass = 'group flex items-center gap-x-3 rounded-md px-3 py-2 text-sm font-semibold transition';
    $activeClass = 'bg-blue-50 text-blue-700';
    $inactiveClass = 'text-gray-600 hover:bg-gray-50 hover:text-blue-700';

    $adminItems = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => 'D'],
        ['label' => 'Document Requests', 'route' => 'admin.document-requests', 'active' => 'admin.document-requests', 'icon' => 'R'],
        ['label' => 'Students', 'route' => 'admin.students', 'active' => 'admin.students', 'icon' => 'S'],
        ['label' => 'Teachers', 'route' => 'admin.teachers', 'active' => 'admin.teachers', 'icon' => 'T'],
        ['label' => 'School Year', 'route' => 'admin.school-years', 'active' => 'admin.school-years', 'icon' => 'Y'],
        ['label' => 'Document Type', 'route' => 'admin.document-type', 'active' => 'admin.document-type', 'icon' => 'F'],
        ['label' => 'Tracks', 'route' => 'admin.tracks', 'active' => 'admin.tracks', 'icon' => 'T'],
        ['label' => 'Strands', 'route' => 'admin.strands', 'active' => 'admin.strands', 'icon' => 'S'],
        ['label' => 'Sections', 'route' => 'admin.sections', 'active' => ['admin.sections', 'admin.sections-schedule'], 'icon' => 'C'],
        ['label' => 'Schedules', 'route' => 'admin.schedules', 'active' => 'admin.schedules', 'icon' => 'H'],
        ['label' => 'Student Report', 'route' => 'admin.student-report', 'active' => 'admin.student-report', 'icon' => 'P'],
        ['label' => 'Users', 'route' => 'admin.users', 'active' => 'admin.users', 'icon' => 'U'],
        ['label' => 'Audit Trail', 'route' => 'admin.audit-trails', 'active' => 'admin.audit-trails', 'icon' => 'A'],
    ];

    $teacherItems = [
        ['label' => 'Dashboard', 'route' => 'teacher.dashboard', 'active' => 'teacher.dashboard', 'icon' => 'D'],
        ['label' => 'Assigned Sections', 'route' => 'teacher.sections', 'active' => 'teacher.sections', 'icon' => 'C'],
        ['label' => 'Subjects', 'route' => 'teacher.subjects', 'active' => 'teacher.subjects', 'icon' => 'S'],
        ['label' => 'Advisory', 'route' => 'teacher.advisory', 'active' => 'teacher.advisory', 'icon' => 'A'],
    ];

    $studentItems = [
        ['label' => 'Dashboard', 'route' => 'student.dashboard', 'active' => 'student.dashboard', 'icon' => 'D'],
        ['label' => 'Request Document', 'route' => 'student.request-document', 'active' => 'student.request-document', 'icon' => 'R'],
        ['label' => 'Enroll', 'route' => 'student.enroll', 'active' => 'student.enroll', 'icon' => 'E'],
    ];
@endphp

<nav class="flex min-h-0 flex-1 flex-col">
    <div class="mb-5 rounded-lg border border-blue-100 bg-blue-50 px-3 py-3">
        <p class="text-[0.7rem] font-semibold uppercase text-blue-700">
            {{ $userType === 'teacher' ? 'Teacher Console' : ($userType === 'student' ? 'Student Portal' : 'Admin Console') }}
        </p>
        <p class="mt-1 text-sm font-medium text-gray-700">VNHS-SHS</p>
    </div>

    <ul role="list" class="space-y-1">
        @foreach ($userType === 'teacher' ? $teacherItems : ($userType === 'student' ? $studentItems : $adminItems) as $item)
            @php
                $activeRoutes = (array) $item['active'];
                $isActive = request()->routeIs(...$activeRoutes);
                $url = $item['url'] ?? route($item['route']);
            @endphp
            <li>
                <a href="{{ $url }}" @class([$baseLinkClass, $activeClass => $isActive, $inactiveClass => ! $isActive])>
                    <span @class([
                        'flex size-7 shrink-0 items-center justify-center rounded-md border text-[0.68rem] font-bold transition',
                        'border-blue-200 bg-white text-blue-700' => $isActive,
                        'border-gray-200 bg-white text-gray-400 group-hover:border-blue-200 group-hover:text-blue-700' => ! $isActive,
                    ])>{{ $item['icon'] }}</span>
                    <span class="truncate">{{ $item['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
