<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;

class EventFactoryTest extends TestCase
{
    public function test_can_create_event_factory()
    {
        $fakeEvent = Event::factory()->create();

        $queryFakeEvent = Event::where('user_id', $fakeEvent->user_id)->first();

        $this->assertSame($queryFakeEvent->user_id, $fakeEvent->user_id);
    }
}
