<?php

namespace App\Http\Controllers\Students;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Location;

class StrudentsController extends Controller
{
  public function import(Request $request)
  {
    $validated = $request->validate([
      'file' => 'required|mimes:xlsx',
      'num_students' => 'required',
      'name' => 'required',
      'time' => 'required',
      'minutes' => 'required',
      'location' => 'required | min:3 | max:50',
    ]);

    $subject = Subject::create([
      'name' => $validated['name'],
      'doctor_id' => Auth::user()->id,
      'location' => $validated['location'],
    ]);

    Excel::import(new StudentsImport, $request->file('file'));

    $students = Student::where('group_id', null)->get();

    $numOfStudents = count($students);
    $numStudentsInGroup = $validated['num_students'];
    $timeOfGroup = Carbon::parse($request->time);
    $numOfGroups = ceil($numOfStudents / $numStudentsInGroup);
    $studentIds = [];

    for($i = 0; $i < $numOfGroups; $i++) {
      $id = Group::create([
        'name' => 'Group ' . ($i + 1),
        'number_of_students' => $i != $numOfGroups - 1 ? $numStudentsInGroup : $numOfStudents - ($numStudentsInGroup * $i),
        'subject_id' => $subject->id,
        'time' => $timeOfGroup->addMinutes($i != 0 ? (float) $request->minutes * $numStudentsInGroup : 0)->format('h:i'),
      ]);

        $studentIds = $students->slice($i * $numStudentsInGroup, $numStudentsInGroup)->pluck('id');

          Student::whereIn('id', $studentIds)->update([
            'group_id' => $id->id,
            'done_exam' => 0
          ]);

    }

    return response()->json(['message' => 'Students imported successfully'], 201);
  }

  public function show($id) {
    $doctor = Auth::user()->subjects()->find($id);
    $groups = $doctor->groups()->with('students')->get();
  return response()->json(['groups' => $groups], 200);
  }

  public function export($id)
  {
    $subject = Subject::find($id)->name;
    return Excel::download(new StudentsExport($id), "{$subject}.xlsx");
  }
}
