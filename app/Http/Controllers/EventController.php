<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        return view('events.create');
    }


    public function store(Request $request)
    {        
        
        $validated = $this->validateInputs($request);
        $request->user()->events()->create($validated);

        return view('events.create');
    }

    private function validateInputs(Request $request): array
    {
        if($request->file('event_picture'))
        {
            $username = $this->formatUsernameToPath();
            $picturePath = $request->file('event_picture')->store($username, 'public');      
                  
        } else {
            $picturePath = "storage/default_picture.png";
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

    private function formatUsernameToPath(): string
    {
        $username = strtolower(Auth::user()->name);

        $formatedUsername = str_replace(' ', '', $username);
        
        return $formatedUsername;
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
