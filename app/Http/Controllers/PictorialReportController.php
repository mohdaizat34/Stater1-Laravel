<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class PictorialReportController extends Controller
{
   public function pictorialreport() {
      $event = Event::all();
      return view('pictorialreport', compact('event'));
   }

   public function postlink(Request $req, $event_id) {
      $event = Event::findOrFail($event_id);
      $event->event_link = $req->link;
      $event->save();
      return redirect('pictorialreport')->with('success', 'Link added successfully!');
   }

   public function editlink(Request $req , $id) {
      $event = Event::find($id);
      return view('pictorialreport', compact('event'));
   }

   public function updatelink(Request $req , $id) {
      $event = Event::find($id);
      $event->event_link = $req->input('link');
      $event->update(); 
      return redirect('picreport');
   }
}
