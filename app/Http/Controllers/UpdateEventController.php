<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UpdateEventController extends Controller
{
    public function update(Request $request, $event_id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'director' => 'required',
            'date' => 'required|date',
            'venue' => 'required',
            'desc' => 'required',
        ]);

        // Find the event by ID
        $event = Event::find($event_id);

        if ($event) {
            // Update the event data
            $event->name = $request->input('name');
            $event->director = $request->input('director');
            $event->date = $request->input('date');
            $event->venue = $request->input('venue');
            $event->description = $request->input('desc');
            $event->save();

            return redirect()->back()->with('success', 'Event data updated successfully.');
        }

        return redirect()->back()->with('error', 'Event not found.');
    }
}
