<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Subject;
use Auth;
use Illuminate\Http\Request;


class DoctorsController extends Controller
{

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:doctors',
      'password' => 'required|string|min:8|confirmed',
    ]);


    Doctor::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'avatar' => 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($request->email))) . '?s=200&d=mm',
    ]);
    return response()->json(['message' => 'Doctor registered successfully'], 201);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return response()->json(['token' => Auth::user()->createToken('doctor-token')->plainTextToken, 'message' => 'Doctor authenticated successfully'], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
  }

  public function logout()
  {
    Auth::logout();
    return response()->json(['message' => 'Doctor logged out successfully'], 200);
  }

  public function dashboard()
  {
    $subjects = Auth::user()->subjects()->get();
    $groups = Auth::user()->groups()->get();

    return view('doctors.dashboard', compact('subjects', 'groups'));
  }

}
