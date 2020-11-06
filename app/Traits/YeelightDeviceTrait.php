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
        $this->lamp = new Yeelight(env('YEELIGHT_IP'), env('YEELIGHT_PORT'));
    }

    public function changeColor($hex)
    {
        $this->lamp->set_rgb($hex);
        $this->lamp->commit();
    }

}
