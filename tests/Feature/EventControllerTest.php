<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    protected User $user;

    private function createNewUser()
    {
        $this->user = User::factory()->create();
    }

    private function authenticate()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);
    }

    public function test_non_authenticated_user_should_be_redirect_to_login(): void
    {
        $response = $this->get('/events/create');

        $response->assertStatus(302);
    }

    public function test_authenticated_user_should_be_able_to_create_event(): void
    {
        $this->createNewUser();
        $this->authenticate();

        $post = $this->post('/events', [
            'event_name' => 'The Event',
            'type' => 'The type',
            'date' => '11/11/2030',
            'local' => 'The place',
            'open_event' => 'on',
            'description' => 'The description',
        ]);

        $this->assertAuthenticated();
        $post->assertStatus(200);
    }

    public function test_user_should_not_be_able_the_post_unvalidated_data()
    {
        $this->createNewUser();
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

    public function test_default_picture_exists()
    {
        $file = 'public/storage/default_picture.png';
        $this->assertFileExists($file);
    }
}
