<?php

namespace App\Traits;

use Socket\Raw\Factory;
use App\Factories\BulbFactory;
use Yeelight\YeelightRawClient;

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
        $this->bulbSearch();
    }

    private function connectClient()
    {
        $socket = new Factory();
        dd($socket->createUdp4()->selectRead(1));
        $bulbFactory = new BulbFactory($socket);
        $this->client = new YeelightRawClient(
            1,
            $socket->createUdp4(),
            $bulbFactory
        );
    }

    private function bulbSearch()
    {
        $this->bulbs = $this->client->search();
    }

}
