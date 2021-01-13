<?php


namespace Hsy\LaraSimotel\Tests;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Hsy\LaraSimotel\Facades\Simotel;

class SimotelApiTest extends TestCase
{

    public function testAllMethods()
    {
        $namespaces = [
            'pbx' => [
                'Users'         => ['create', 'update', 'search', 'remove'],
                'Trunks'        => ['create', 'update', 'search', 'remove'],
                'Queues'        => ['create', 'update', 'search', 'remove', 'addAgent', 'removeAgent', 'pauseAgent', 'resumeAgent'],
                'blacklists'    => ['add', 'update', 'search', 'remove'],
                'whitelists'    => ['add', 'update', 'search', 'remove'],
                'announcements' => ['upload', 'add', 'update', 'search', 'remove'],
                'musicOnHolds'  => ['search'],
                'faxes'         => ['upload', 'add', 'search', 'download'],
            ],
            'call' => [
                'originate' => ['act'],
            ],
            'voicemails' => [
                'voicemails' => ['add', 'update', 'remove', 'search'],
                'inbox'      => ['read', 'search'],
            ],
            'reports' => [
                'quick' => ['search', 'info', 'cdr'],
            ],
            'autodialer' => [
                'announcements' => ['upload', 'add', 'update', 'remove', 'search'],
                'campaigns'     => ['add', 'update', 'remove', 'search'],
                'contacts'      => ['add', 'update', 'remove', 'search'],
                'groups'        => ['upload', 'add', 'update', 'remove', 'search'],
                'reports'       => ['info', 'search'],
                'trunks'        => ['update', 'search'],
            ],
        ];

        foreach ($namespaces as $namespace => $groups) {
            foreach ($groups as $group => $methods) {
                array_walk($methods, $this->executeMethods($namespace, $group));
            }
        }
    }

    public function executeMethods($namespace, $group)
    {
        return function ($method) use ($namespace, $group) {
            $result = Simotel::connect(config("simotel"))->$namespace()->$group(null, $this->createHttpClient())->$method();
            self::assertEquals(1, $result->success);
        };
    }

    public function createHttpClient()
    {
        $res = json_encode(['success' => 1, 'message' => 'message', 'data' => ['data']]);
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], $res),
        ]);

        $handlerStack = HandlerStack::create($mock);

        return new Client(['handler' => $handlerStack]);
    }
}