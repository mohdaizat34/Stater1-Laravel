<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FormController extends Controller
{
   public function form() {
    $form = array();
    $form = Event::all();
    
    
    return view('form', compact('form'));
   }

   public function postevent(Request $req) {
      $event = new Event();
      $event->event_name = $req->name;
      $event->event_director = $req->director;
      $event->event_venue = $req->venue;
      $event->event_desc = $req->desc;
      $event->event_date = $req->date;
      $event->event_type = $req->type;
      $event->event_status = $req->status;
      $event->save();
      return redirect('event');
    }

    public function view_paperwork()
   {
    // Access the passed data using the $id variable
    // Perform necessary operations using the data

      $data = array();  
      $data = Event::all();

      return view('paperwork',compact('data') );
   }

    
}
