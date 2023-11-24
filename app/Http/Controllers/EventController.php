<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::where('user_id', Auth::user()->id)->get();

        return view('index', [
            'events' => $events,
            'user' => Auth::user()->name,
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
    public function store(Request $request): RedirectResponse
    {                
        $validated = $this->validateInputs($request);
        $request->user()->events()->create($validated);

        return redirect(route('events.index'));
    }

    /**
     * Validade request inputs from user.
     */
    private function validateInputs(Request $request): array
    {
        if($request->file('event_picture'))
        {
            $picturePath = $this->setUserPicturePath();
            $picturePath = $request->file('event_picture')->store($picturePath, 'public');      
        } else {
            $picturePath = "images/default_picture.png";
        }
        
        $validated = $request->validate([
            'event_name' => 'string|required',
            'type' => 'string|required',
            'date' => 'date|required|after_or_equal:today',
            'time' => 'date_format:H:i|required',
            'local' => 'string|required',
            'open_event' => 'in:on,off',
            'description' => 'string|max:255',
        ]);
        
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
