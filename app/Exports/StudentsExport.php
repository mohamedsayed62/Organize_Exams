<?php

// app/Exports/StudentsExport.php

namespace App\Exports;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class StudentsExport implements FromView, ShouldAutoSize
{

    protected $subjectId;
    public function __construct($subjectId)
    {
        $this->subjectId = $subjectId;
    }
    public function view(): View
    {

        $groups = Group::with('subject')->where('subject_id', $this->subjectId)->get();
        $students = Student::with('group')->whereIn('group_id', $groups->pluck('id'))->get();
        $subject = Subject::find($this->subjectId);
        return view('groups.export', [
            'groups' => $groups,
            'students' => $students,
            'subjectName' => $subject->name,
            'location' => $subject->location,
        ]);
    }
}
