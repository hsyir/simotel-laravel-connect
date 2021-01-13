<?php


namespace Hsy\LaraSimotel\Tests;


use Hsy\LaraSimotel\Facades\Simotel;

class BasicTest extends TestCase
{
    public function testConfigs()
    {
        dd(config("simotel"));
    }
}