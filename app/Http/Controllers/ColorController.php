<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Traits\YeelightDeviceTrait;
use Yeelight\Bulb\Bulb;

class ColorController extends Controller
{

    use YeelightDeviceTrait;

    public function __construct()
    {
        $this->start();
    }


    public function change(string $color)
    {
        $colors = $this->getColors();
        if (!count($this->bulbs)) {
            return 'No bulbs found';
        }
        if (!in_array($color, $colors->pluck('name')->toArray())) {
            return 'Color not found';
        }

        foreach($this->bulbs as $bulb) {
            $rgb = $colors->where('name', $color)->first();
            $bulb->setRgb($rgb->rgb, Bulb::EFFECT_SMOOTH, 1000);
        }

        return 'Color has changed';
    }

    private function getColors()
    {
        return Color::all(['name', 'rgb']);
    }

}
