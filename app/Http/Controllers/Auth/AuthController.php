<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function redirectToGoogle()
  {
      return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    $googleUser = Socialite::driver('google')->user();

    $doctor = Doctor::firstOrCreate(
      ['google_id' => $googleUser->getId()],
      [
        'name'   => $googleUser->getName(),
        'email'  => $googleUser->getEmail(),
        'avatar' => $googleUser->getAvatar(),
      ]
    );

      Auth::login($doctor);

      return response()->json(['token' => Auth::user()->createToken('doctor-token')->plainTextToken, 'message' => 'Doctor authenticated successfully'], 200);
  }
}
