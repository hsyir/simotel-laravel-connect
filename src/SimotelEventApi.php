<?php
/**
 * Created by PhpStorm.
 * User: 5729906803
 * Date: 9/13/2020
 * Time: 1:04 PM
 */

namespace Hsy\SimotelConnect;


use Illuminate\Support\Facades\Http;

class SimotelEventApi
{
    public function dispatchSimotelEvent($data)
    {
        $eventClass = config("simotel.simotelEventApi.events." . $data["event_name"]);
        dump($eventClass);
        event(new $eventClass($data));
    }
}
