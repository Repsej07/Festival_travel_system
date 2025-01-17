<?php

namespace App\Faker;

use Faker\Provider\Base;

class EventProvider extends Base
{
    public function eventName()
    {
        $events = [
            'Tech Conference',
            'Music Festival',
            'Art Exhibition',
            'Food Tasting Event',
            'Marathon',
            'Startup Pitch',
            'Workshop: Learn Laravel',
            'Charity Run',
            'Film Screening',
            'Book Launch',
        ];

        return $this->generator->randomElement($events);
    }

    public function eventLocation()
    {
        $locations = [
            'New York City, NY',
            'San Francisco, CA',
            'Austin, TX',
            'Los Angeles, CA',
            'Chicago, IL',
            'Paris, France',
            'Tokyo, Japan',
            'Sydney, Australia',
            'Berlin, Germany',
            'Cape Town, South Africa',
        ];

        return $this->generator->randomElement($locations);
    }

    public function eventDate()
    {
        return $this->generator->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d H:i:s');
    }
}
