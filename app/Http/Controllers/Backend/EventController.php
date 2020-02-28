<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('backend.event', compact('events'));
    }

    public function detail($id)
    {
        $event = Event::find($id);
        return view('backend.event_detail', compact('event'));
    }

    public function addform()
    {
        return view('backend.add_event');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Enter Event Name',
        ]);

        $event = Event::create([
            'name' => request('name'),
            'start' => request('start'),
            'end' => request('end'),
            'status' => request('status')
        ]);

        return redirect('/events/add')->with('success', 'Event Added');
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = request('name');
        $event->start = request('start');
        $event->end = request('end');
        $event->status = request('status');

        $event->update();
       
        return view('backend.event_detail', compact('event'));
    }
}
