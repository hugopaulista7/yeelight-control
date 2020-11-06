<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Traits\YeelightDeviceTrait;

class ColorController extends Controller
{

    use YeelightDeviceTrait;


    public function list()
    {
        $colors = Color::all(['name', 'hex']);
        return view('welcome', ['colors' => $colors]);
    }

    public function change(string $color)
    {
        $this->start();
        if ($color === 'random') {
            $this->changeRandomColor();
        } else {
            $this->changeSingleColor($color);
        }
        return 'Color has changed';
    }


    private function getColors()
    {
        return Color::all(['name', 'hex']);
    }

    private function changeRandomColor()
    {
        $colors = $this->getColors()->pluck('hex');

        $index = random_int(0, count($colors) - 1);

        $hex = hexdec($colors[$index]);

        $this->changeColor($hex);
    }

    private function changeSingleColor($color)
    {
        $colors = $this->getColors();

        if (!in_array($color, $colors->pluck('name')->toArray())) {
            return 'Color not found';
        }

        $hex = $colors->where('name', $color)->first()->hex;

        $this->changeColor(hexdec($hex));
    }


}
