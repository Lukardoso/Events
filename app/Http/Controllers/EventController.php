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
    public function index(): View
    {
        $events = Event::where('user_id', Auth::user()->id)->get();

        return view('index', [
            'events' => $events,
        ]);
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(Request $request): RedirectResponse
    {        
        
        $validated = $this->validateInputs($request);
        $request->user()->events()->create($validated);

        return redirect(route('events.index'));
    }

    private function validateInputs(Request $request): array
    {
        if($request->file('event_picture'))
        {
            $picturePath = $this->userPicturePath();
            $picturePath = $request->file('event_picture')->store($picturePath, 'public');      
        } else {
            $picturePath = "images/default_picture.png";
        }
        
        $validated = $request->validate([
            'event_name' => 'string|required',
            'type' => 'string|required',
            'date' => 'date|required|after_or_equal:today',
            'local' => 'string|required',
            'open_event' => 'in:on,off',
            'description' => 'string|max:255',
        ]);
        
        $validated = $validated += ['event_picture' => $picturePath];

        return $validated;
    }

    private function userPicturePath(): string
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
