<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::where('user_id', Auth::user()->id)->get();

        return view('events.index', [
            'events' => $events,
            'user' => Auth::user()->name,
        ]);
    }

    /**
     * Display a single event details
     */
    public function eventDetails(string $id): View
    {
        $event = Event::where('id', $id)->first();

        return view('events.details', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): RedirectResponse
    {                
        $validated = $this->validateInputs($request);
        $request->user()->events()->create($validated);

        return redirect(route('events.index'));
    }


    // I NEED TO REFACTOR THIS IN SOME WAY ----------------------------------------------------------

    /**
     * Validade request inputs from user.
     */
    private function validateInputs(EventRequest $request): array
    {
        if($request->file('event_picture'))
        {
            $picturePath = $this->setUserPicturePath();
            $picturePath = $request->file('event_picture')->store($picturePath, 'public');      
        } else {
            $picturePath = "default_picture.png";
        }
        
        $validated = $request->validated();
        
        $validated = $validated += ['event_picture' => $picturePath];

        return $validated;
    }

    /**
     * Create a path to the event image with the username.
     */
    private function setUserPicturePath(): string
    {
        $username = strtolower(Auth::user()->name);

        $picturePath = str_replace(' ', '', $username);
        
        return $picturePath;
    }

    // ---------------------------------------------------------------------------------------------


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
