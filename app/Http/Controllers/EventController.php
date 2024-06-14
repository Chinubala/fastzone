<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $Events = Event::orderBy('created_at','DESC')->get();

        return view('events.list',[
            'Events' => $Events
        ]);
    }
    public function create(){
        return view("events.create");
    }
    public function store(Request $request){
        $rules =[
            'eventtitle' => 'required|min:5',
            'description' => 'required|min:5',
            'eventdate' => 'required',
            'eventtime' => 'required',
            'venue' => 'required|min:5',
            'seat' => 'required',
            'price' => 'required',
 ];
       $validator= Validator::make($request->all(),$rules);
     
        if ($validator->fails()) {
            return redirect()->route('events.create')->withInput()->withErrors($validator);
        }
        $Event = new Event();
        $Event->eventtitle = $request->eventtitle;
        $Event->description = $request->description;
        $Event->eventdate = $request->eventdate;
        $Event->eventtime = $request->eventtime;
        $Event->venue = $request->venue;
        $Event->seat = $request->seat;
        $Event->price = $request->price;
        $Event->save();
        return redirect()->route('events.index')->with('success','Events added successfully.');


    }
    public function edit($id) {
        $Event = Event::findOrFail($id);
        return view('events.edit',[
            'Event' => $Event
        ]);
    }

    public function update($id, Request $request) {

        $Event = Event::findOrFail($id);

        $rules = [
            'eventtitle' => 'required|min:5',
            'description' => 'required|min:5',
            'eventdate' => 'required',
            'eventtime' => 'required',
            'venue' => 'required|min:5',
            'seat' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('events.edit',$Event->id)->withInput()->withErrors($validator);
        }

        // here we will update product
        $Event->eventtitle = $request->eventtitle;
        $Event->description = $request->description;
        $Event->eventdate = $request->eventdate;
        $Event->eventtime = $request->eventtime;
        $Event->venue = $request->venue;
        $Event->seat = $request->seat;
        $Event->price = $request->price;
        $Event->save();

       
        return redirect()->route('events.index')->with('success','event updated successfully.');
    }

    public function destroy($id) {
        $Event = Event::findOrFail($id);

       // delete product from database
       $Event->delete();

       return redirect()->route('events.index')->with('success','Event deleted successfully.');
    }


}
