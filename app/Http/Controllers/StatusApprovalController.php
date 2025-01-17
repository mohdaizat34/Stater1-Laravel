<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class StatusApprovalController extends Controller
{
   public function statusapproval() {
    $statusapproval = array();
    $statusapproval = Event::all();
    
    
    return view('statusapproval', compact('statusapproval'));
   }

   public function postevent(Request $req) {
        $event = new Event();
        $event->event_name = $req->name;
        $event->event_director = $req->director;
        $event->event_venue = $req->venue;
        $event->event_desc = $req->desc;
        $event->event_date = $req->date;
        $event->event_link = $req->link;
        $event->event_status = $req->status;
        $event->save();
        return redirect('event');
   }

   
}
