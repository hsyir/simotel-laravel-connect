<?php


namespace Hsy\LaraSimotel\Tests;

use Hsy\LaraSimotel\Facades\Simotel;
use Illuminate\Support\Facades\Event;

class SimotelEventApiTest extends TestCase
{
    public function testLaravelSimotelEventsDispatched()
    {
        $events = array_keys(config("simotel.simotelEventApi.events"));

        foreach ($events as $event) {
            $eventClass = config("simotel.simotelEventApi.events." . $event);

            Event::fake([
                $eventClass
            ]);

            Simotel::eventApi()->dispatch($event, []);
            Event::assertDispatched($eventClass);
        }
    }
}