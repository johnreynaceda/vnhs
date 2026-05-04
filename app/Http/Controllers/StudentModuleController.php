<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Models\TeacherModule;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentModuleController extends Controller
{
    public function show(TeacherModule $module): StreamedResponse
    {
        $module = $this->studentModuleQuery()->whereKey($module->id)->firstOrFail();

        abort_unless(Storage::disk('public')->exists($module->file_path), 404);

        return Storage::disk('public')->response($module->file_path, $module->file_name);
    }

    public function download(TeacherModule $module): StreamedResponse
    {
        $module = $this->studentModuleQuery()->whereKey($module->id)->firstOrFail();

        abort_unless(Storage::disk('public')->exists($module->file_path), 404);

        return Storage::disk('public')->download($module->file_path, $module->file_name);
    }

    private function studentModuleQuery()
    {
        $student = auth()->user()->student;
        $schoolYearId = $student?->school_year_id ?: SchoolYear::active()?->id;

        return TeacherModule::query()
            ->when(
                $student?->section_id,
                fn ($query) => $query->where('section_id', $student->section_id),
                fn ($query) => $query->whereRaw('1 = 0')
            )
            ->when(
                $schoolYearId,
                fn ($query) => $query->where('school_year_id', $schoolYearId),
                fn ($query) => $query->whereRaw('1 = 0')
            );
    }
}
