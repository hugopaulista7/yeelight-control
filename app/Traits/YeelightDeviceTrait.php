<?php

namespace App\Traits;

use App\Services\Yeelight;

trait YeelightDeviceTrait
{

    /**
     * Connection to Yeelight
     *
     * @var Yeelight
     */
    protected $lamp;

    public function start()
    {
        $this->lamp = new Yeelight('192.168.1.3', '55443');
    }

    public function changeColor($hex)
    {
        $this->lamp->set_rgb($hex);
        $this->lamp->commit();
    }

}
