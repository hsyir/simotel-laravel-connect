<?php
/**
 * Created by PhpStorm.
 * User: HosseinYaghmaee@gmail.com
 * Date: 9/13/2020
 * Time: 12:57 PM
 */

return [

    /*
     *
     */
    "smartApi" => [
        "methodsRepositoryClass" => \App\Classes\SmartApiMethodsRepo::class,
    ],

    /*
     *
     */
    "simotelApi" => [
        "apiUrl" => env("SIMOTEL_API_SERVER", "127.0.0.1"),
        "user" => env("SIMOTEL_API_USER", "user"),
        "pass" => env("SIMOTEL_API_PASS", "pass"),
    ],

    /*
     *
     */
    "simotelEventApi" => [
        "events" => [
            "Cdr" => \Hsy\SimotelConnect\Events\SimotelEventCdr::class,
            "NewState" => \Hsy\SimotelConnect\Events\SimotelEventNewState::class,
            "ExtenAdded" => \Hsy\SimotelConnect\Events\SimotelEventExtenAdded::class,
            "ExtenRemoved" => \Hsy\SimotelConnect\Events\SimotelEventExtenRemoved::class,
            "IncomingCall" => \Hsy\SimotelConnect\Events\SimotelEventIncomingCall::class,
            "OutGoingCall" => \Hsy\SimotelConnect\Events\SimotelEventOutgoingCall::class,
            "Transfer" => \Hsy\SimotelConnect\Events\SimotelEventTransfer::class,
        ]
    ]
];
