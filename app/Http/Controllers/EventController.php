<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
   public function event() {
    $event = array();
    $event = Event::all();
    
    
    return view('event', compact('event'));
   }

   public function postevent(Request $req) {
        $event = new Event();
        $event->event_name = $req->name;
        $event->event_director = $req->director;
        $event->event_venue = $req->venue;
        $event->event_desc = $req->desc;
        $event->event_date = $req->date;
        $event->event_status = $req->status;
        $event->save();
        return redirect('event');
   }

   
}
