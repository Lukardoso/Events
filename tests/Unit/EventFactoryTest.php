<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventFactoryTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_event_factory_can_be_created(): void
    {
        $user = User::factory()->create();
        $fakeEvent = Event::factory()->make(['user_id' => $user->id]);

        $this->assertSame($fakeEvent->user_id, $user->id);
    }
}
