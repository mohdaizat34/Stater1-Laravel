<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PicReport;

class PicReportController extends Controller
{
   public function picreport() {
    $picreport = array();
    $picreport = PicReport::all();
    
    
    return view('picreport', compact('picreport'));
   }

   public function postlink(Request $req, $id) {
      $event = Event::findOrFail($id);
      $event->event_link = $req->link;
      $event->save();
      return redirect('picreport');
   }

   
}
