<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function getAll()
    {
        return 'success';
    }
}
