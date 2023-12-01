<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

trait FakeAuthenticatedUser
{
    use MakesHttpRequests;

    protected User $user;

    public function authenticate(): void
    {
        $this->createFakeUser();

        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);
    }

    public function createFakeUser(): void
    {
        $this->user = User::factory()->create();
    }

    public function createFakeEvent(): void
    {        
        $this->post(route('events.store'), [
            'event_name' => 'An Unique Event',
            'user_id' => $this->user->id,
            'type' => 'An Unique Type',
            'date' => '11/11/2100',
            'time' => '20:00',
            'local' => 'An Unique Place',
            'open_event' => 'on',
            'description' => 'An Unique Description',
        ]);
    }
}