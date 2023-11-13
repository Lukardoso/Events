<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => 'Fake Event',
            'user_id' => $this->getRandomUser(),
            'type' => 'Fake Type',
            'date' => '11/11/3000',
            'local' => 'Fake Place',
            'open_event' => 'on',
            'description' => 'Fake Description',
            'event_picture' => 'public/storage/default_picture.png',
        ];
    }

    private function getRandomUser()
    {
        $userLenght = User::all()->count();
        $randomUser = random_int(1, $userLenght);

        if(!User::where('id', $randomUser)) {
            getRandomUser();
        }

        return $randomUser;
    }
}
