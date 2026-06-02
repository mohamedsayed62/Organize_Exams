<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Auth;
use Illuminate\Http\Request;

class StudentPageController extends Controller
{
  public function index()
  {
    $subjects = Subject::withCount('groups')->get();
    return response()->json(['subjects' => $subjects], 200);
  }

  public function showExam($subjectId)
  {
    $subject = Subject::findOrFail($subjectId);
    $student = $subject->students()->where('done_exam', 0)->first();
    $groups = $subject->groups()->with('students')->get();


    return response()->json([
      'current_student' => $student,
      'groups' => $groups
    ], 200);
  }
}
