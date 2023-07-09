<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    
    public function checklist()
    {
        return view('checklist');
    }
}
