<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $strands = \App\Models\Strand::withCount('students')->get();
        $strandLabels = empty($strands) ? '[]' : $strands->pluck('name')->toJson();
        $strandData = empty($strands) ? '[]' : $strands->pluck('students_count')->toJson();

        return view('livewire.admin.admin-dashboard', [
            'studentsCount' => \App\Models\Student::count(),
            'teachersCount' => \App\Models\Teacher::count(),
            'documentsCount' => \App\Models\StudentRequest::count(),
            'usersCount' => \App\Models\User::count(),
            'strandLabels' => $strandLabels,
            'strandData' => $strandData,
        ]);
    }
}
