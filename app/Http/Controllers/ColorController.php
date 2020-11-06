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
        if (!in_array($color, $colors->pluck('name')->toArray())) {
            return 'Color not found';
        }

        $hex = $colors->where('name', $color)->first()->hex;
        $this->changeColor(hexdec($hex));

        return 'Color has changed';
    }

    private function getColors()
    {
        return Color::all(['name', 'hex']);
    }

}
