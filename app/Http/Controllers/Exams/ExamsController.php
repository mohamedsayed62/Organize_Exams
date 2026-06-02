<?php

namespace App\Http\Controllers\Exams;

use App\Events\StudentUpdated;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamsController extends Controller
{

  public function showExam($subjectId)
  {
    $subject = Subject::findOrFail(706);
    $student = $subject->students()->where('done_exam', 0)->first();
    $groups = $subject->groups()->with('students')->get();

    return response()->json([
      'current_student' => $student,
      'groups' => $groups
    ], 200);
  }

  public function updateStudentDoneExam($studentId)
  {
    $student = Student::findOrFail($studentId);
    $student->done_exam = 1;
    $student->save();

    broadcast(new StudentUpdated($student));

    return response()->json(['message' => 'Done Updated Students'], 200);
  }

}
