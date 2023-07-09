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

   public function updatestatus(Request $req , $id) {
      $event = Event::find($id);
      $event->event_status = $req->input('status');
      $event->event_remark = $req->input('remark');
      $event->update(); 
      return redirect('event'); 
   }

   public function update_event(Request $req , $id) {
      $event = Event::find($id);
      $event->event_name = $req->input('name');
      $event->event_director = $req->input('director');
      $event->event_venue = $req->input('venue');
      $event->event_desc = $req->input('desc');
      $event->event_date = $req->input('date');
      $event->update(); 
      return redirect('event'); 
   }

   public function eventdestroy(Request $req , $id) {
      $event = Event::find($id);
      $event->delete();
      return redirect('event'); 
   }

   public function editevent(Request $req , $id) {
      $event = Event::find($id);
      return view('edit', compact('event'));
   }
}
