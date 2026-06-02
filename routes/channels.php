<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('student-updates', function ($user) {
    return true; // allow any authenticated user
});