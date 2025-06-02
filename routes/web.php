<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsEnrolled;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\DocumentRequestRecord;
use App\Livewire\Admin\DocumentTypeRecord;
use App\Livewire\Admin\ScheduleRecord;
use App\Livewire\Admin\SectionList;
use App\Livewire\Admin\StrandRecord;
use App\Livewire\Admin\StrandSubjectList;
use App\Livewire\Admin\StudentRecord;
use App\Livewire\Admin\TeacherRecord;
use App\Livewire\Admin\TrackRecord;
use App\Livewire\Student\DocumentRequest;
use App\Livewire\Student\Enroll;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Teacher\TeacherDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'teacher':
            return redirect()->route('teacher.dashboard');
        case 'student':
            return redirect()->route('student.dashboard');

        default:
            # code...
            break;
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/students', StudentRecord::class)->name('admin.students');
    Route::get('/document-requests', DocumentRequestRecord::class)->name('admin.document-requests');
    Route::get('/teachers', TeacherRecord::class)->name('admin.teachers');
    Route::get('/tracks', TrackRecord::class)->name('admin.tracks');
    Route::get('/sections', TrackRecord::class)->name('admin.sections');
    Route::get('/strands', StrandRecord::class)->name('admin.strands');
    Route::get('/sections', SectionList::class)->name('admin.sections');
    Route::get('/sections/{id}/schedule', ScheduleRecord::class)->name('admin.sections-schedule');
    Route::get('/schedules', ScheduleRecord::class)->name('admin.schedules');
    Route::get('/document-type', DocumentTypeRecord::class)->name('admin.document-type');
    Route::get('/strands/{id}/subjects', StrandSubjectList::class)->name('admin.strand-subject');
});

Route::prefix('/teacher')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', TeacherDashboard::class)->name('teacher.dashboard');
});

Route::prefix('/student')->middleware(['auth', 'verified'])->group(function () {
    Route::middleware([IsEnrolled::class])->group(function () {
        Route::get('/', StudentDashboard::class)->name('student.dashboard');
        Route::get('/request-document', DocumentRequest::class)->name('student.request-document');
    });

    Route::get('/enroll', Enroll::class)->name('student.enroll');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
