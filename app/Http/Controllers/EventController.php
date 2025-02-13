<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\EventCreation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->get();

        $weather = Http::get('http://api.weatherstack.com/current', [
            'access_key' => '56e27d6626a4c37e47e7936dfd8e1d36',
            'query' => 'Malaysia',

        ]);

        $weathers = $weather["location"];

        // echo $weathers;

        // die();

        return view('events', compact('events', 'weathers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $slug = Str::slug($request->name, '-');

        $event->name = $request->name;
        $event->slug = $slug;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;

        $event->save();

        $event->sendNotificationEmail();



        return back()->with('event_created', 'Event has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('id', $id)->first();
        return view('single-event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $slug = Str::slug($request->name, '-');

        $event->name = $request->name;
        $event->slug = $slug;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;

        $event->save();
        return back()->with('event_updated', 'Event has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id', $id)->delete();
        return back()->with('event_deleted', 'Event has been deleted successfully!');
    }
}
