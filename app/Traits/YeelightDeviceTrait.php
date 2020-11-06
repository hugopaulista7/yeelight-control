<?php

namespace App\Traits;

use Yeelight\YeelightClient;

trait YeelightDeviceTrait
{

    /**
     * Connection to Yeelight
     *
     * @var YeelightClient
     */
    protected $client;
    protected $bulbs;

    public function start()
    {
        $this->connectClient();
        dd($this->client);
        $this->bulbSearch();
    }

    private function connectClient()
    {
        $this->client = new YeelightClient();
    }

    private function bulbSearch()
    {
        $this->bulbs = $this->client->search();
    }

}
