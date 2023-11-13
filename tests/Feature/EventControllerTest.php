<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\EventController;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    protected User $user;


    private function authenticate()
    {
        $this->createNewUser();

        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);
    }

    private function createNewUser()
    {
        $this->user = User::factory()->create();
    }

    public function test_non_authenticated_user_should_be_redirect_to_login(): void
    {
        $response = $this->get('/events/create');

        $response->assertStatus(302);
    }

    public function test_authenticated_user_should_be_able_to_create_event(): void
    {
        $this->authenticate();

        $post = $this->post(route('events.store'), [
            'event_name' => 'The Event',
            'user_id' => $this->user->id,
            'type' => 'The type',
            'date' => '11/11/2030',
            'local' => 'The place',
            'open_event' => 'on',
            'description' => 'The description',
        ]);

        $this->assertAuthenticated();
        $post->assertStatus(200);
    }

    public function test_user_should_not_be_able_to_post_unvalidated_data(): void
    {
        $this->authenticate();

        $post = $this->post('/events', [
            'event_name' => 123,
            'type' => 123,
            'date' => '11 nov 2023',
            'local' => 'https://myadress.com',
            'open_event' => 1,
            'description' => '',
        ]);

        $this->assertNotTrue($post);
        $post->assertStatus(302);
    }

    public function test_default_picture_exists(): void
    {
        $file = 'public/storage/default_picture.png';
        $this->assertFileExists($file);
    }

    public function test_events_can_be_rendered()
    {
        $this->authenticate();

        $indexRoute = $this->get(route('events.index'));        
        $indexRoute->assertStatus(200);
    }

}
