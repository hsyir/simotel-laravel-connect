<?php

namespace Hsy\SimotelConnect;


use Illuminate\Support\Facades\Http;

class SimotelApi
{
    private $message = "";

    private function call($query)
    {
        $user = config("simotel.simotelApi.user");
        $pass = config("simotel.simotelApi.pass");
        $apiServer = config("simotel.simotelApi.apiUrl");

        try {
            $endpoint = $apiServer . "/" . $query;
            $response = Http::withBasicAuth($user, $pass)->post($endpoint);
            $res = $response->json();
            $this->message = $res["message"];
            if ($res["ok"] == 1)
                return true;
            return false;

        } catch (\Exception $e) {
            $this->message = $e->getMessage();
            return false;
        }

    }

    public function getMessage()
    {
        return $this->message;
    }

    public function addToQueue($queue, $source, $agent, $penalty = 0)
    {
        $query = "queue/add/?queue={$queue}&source={$source}&agent={$agent}&penalty={$penalty}";
        return $this->call($query);
    }

    public function removeFromQueue($queue, $agent)
    {
        $query = "/queue/remove/?queue={$queue}&agent={$agent}";
        return $this->call($query);
    }

    public function pauseInQueue($queue, $agent)
    {
        $query = "/queue/pause/?queue={$queue}&agent={$agent}";
        return $this->call($query);
    }

    public function resumeInQueue($queue, $agent)
    {
        $query = "/queue/resume/?queue={$queue}&agent={$agent}";
        return $this->call($query);
    }
}
