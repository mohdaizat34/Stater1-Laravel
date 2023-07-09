<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class UpdateFormController extends Controller
{
   public function updateform() {
    $updateform = array();
    $updateform = Event::all();
    
    
    
    return view('updateform', compact('updateform'));
   }

   public function postupdate(Request $request, $event_id) {
      
      {
         
         // Retrieve the event with the given event_id
         $event = Event::find($event_id);
 
         // Update the event data
         if ($event) {
             // Validate the request data
             $validatedData = $request->validate([
                 'name' => 'required',
                 'director' => 'required',
                 'venue' => 'required',
                 'desc' => 'required',
                 'date' => 'required|date',
                 'type' => 'required',
                 'status' => 'required',
             ]);
 
             $event->event_name = $request->input('name');
             $event->event_director = $request->input('director');
             $event->event_venue = $request->input('venue');
             $event->event_desc = $request->input('desc');
             $event->event_date = $request->input('date');
             $event->event_type = $request->input('type');
             $event->event_status = $request->input('status');
             $event->save();
 
             return redirect('event')->with('success', 'Event updated successfully.');
         }
 
         if ($event) {
            return view('edit_event')->with('event', $event);
        }
    
        return redirect()->back()->with('error', 'Event not found.');
     }
      return redirect('event');
      
    }

    
    

    
}
