<?php

namespace Tests\Unit;

use Tests\TestCase;
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
