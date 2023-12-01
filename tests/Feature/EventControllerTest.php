<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Http\UploadedFile;
use Tests\FakeAuthenticatedUser;
use Tests\TestCase;


class EventControllerTest extends TestCase
{
    use FakeAuthenticatedUser;

    public function test_non_authenticated_user_should_be_redirect_to_login(): void
    {
        $response = $this->get('/events/create');

        $response->assertStatus(302);
    }

    public function test_authenticated_user_should_be_able_to_create_event(): void
    {
        $this->authenticate();
        $this->createFakeEvent();

        $postedEvent = Event::where('user_id', $this->user->id)
            ->first()
            ->user_id;
        
        $this->assertEquals($this->user->id, $postedEvent);
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

    public function test_invalid_picture_cant_be_posted()
    {
        $this->authenticate();

        $file = UploadedFile::fake()->image('image.xyz');

        $response = $this->post(route('events.store'), [
            'event_picture' => $file,
        ]);

        $response->assertInvalid(['event_picture']);
    }

    public function test_events_can_be_rendered()
    {
        $this->authenticate();

        $indexRoute = $this->get(route('events.index'));        
        $indexRoute->assertStatus(200);
    }

    public function test_should_load_event_data()
    {
        $this->authenticate();
        $this->createFakeEvent();

        $response = $this->get(route('events.index'));
        $response->assertSeeText([
            'An Unique Event',
            'An Unique Place',
            '11/11/2100',
            '20:00',
        ]);
    }

    public function test_event_details_can_be_rendered()
    {
        $this->authenticate();
        $this->createFakeEvent();

        $usersEvent = Event::where('user_id', $this->user->id)->first();

        $response = $this->get('/events/'.$usersEvent->id);

        $response->assertStatus(200);
        $response->assertSee($usersEvent->event_picture);
        $response->assertSeeText([
            $usersEvent->event_name,
            $usersEvent->event_date,
            $usersEvent->event_time,
            $usersEvent->event_local,
            'Editar Evento',
            'Excluir Evento',
            'Enviar Convite',
            'Desconvidar',
            'Enviar Notificação',
            'Nome',
            'Telefone',
            'Email',
            'Confirmado',
        ]);        
    }

    public function test_if_resource_cannot_be_found_redirect_to_index()
    {
        $response = $this->get('/events/unknown-resource');
        $response->assertStatus(302);
    }
}
