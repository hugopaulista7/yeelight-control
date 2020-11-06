<?php

namespace App\Factories;

use Yeelight\Bulb\Bulb;
use Yeelight\Bulb\BulbFactory as BaseFactory;

class BulbFactory extends BaseFactory
{

    private $socketFactory;

    public function create(array $data): Bulb
    {
        dd($data);
        return parent::create($data);
    }

    /**
     * @param string $location
     *
     * @return array
     */
    private function extractIpAndPort(string $location): array
    {
        $address = explode('yeelight://', $location);

        return explode(':', end($address));
    }

}
